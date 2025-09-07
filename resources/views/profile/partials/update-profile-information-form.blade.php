<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            تحديث بيانات الحساب
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الاسم</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"/>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">البريد الإلكتروني</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"/>
        </div>

        <!-- Phone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">رقم الهاتف</label>
            <input id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"/>
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الدور</label>
            <select id="role" name="role"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                <option value="user"  @selected(old('role', $user->role) == 'user')>مستخدم</option>
                <option value="staff" @selected(old('role', $user->role) == 'staff')>موظف</option>
                <option value="admin" @selected(old('role', $user->role) == 'admin')>مدير</option>
            </select>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">حفظ التعديلات</button>
        </div>
    </form>
</section>


