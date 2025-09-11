<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable){
        return [
             'order_id'      => $this->order->id,
            // اسم العميل: لو فيه user مرتبط استخدم $this->order->user->name
            // وإلا استخدم حقل name الموجود في جدول orders (اللي المستخدم أدخله في checkout)
            'name'          => $this->order->name,
            'amount'        => $this->order->amount,
            'message'       => "طلب جديد من {$this->order->name}",
            // المكان الّي تريد الانتقال إليه عند الضغط (هنا نوجه لصفحة عرض الأوردرات في الداش)
            'url'           => route('dashboard.orders.index'),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
