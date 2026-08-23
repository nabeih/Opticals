 function showPage(pageId) {
            document.querySelectorAll('.page').forEach(function(page) {
                page.classList.remove('active');
            });

            const target = document.getElementById('page-' + pageId);
            if (target) {
                target.classList.add('active');
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });

            // إغلاق نموذج الجلسة إذا كان مفتوحاً
            const sessionForm = document.getElementById('sessionForm');
            if (sessionForm) {
                sessionForm.classList.remove('show');
            }
        }

        // ================================================================
        // نموذج الحجز
        // ================================================================
        function handleBooking(event) {
            event.preventDefault();

            const name = document.getElementById('fullName').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const complaint = document.getElementById('complaint').value.trim();

            if (!name || !phone || !complaint) {
                alert('⚠️ الرجاء تعبئة جميع الحقول المطلوبة (الاسم، الجوال، الشكوى)');
                return;
            }

            if (!/^[0-9]{10,13}$/.test(phone)) {
                alert('⚠️ رقم الجوال يجب أن يكون من 10 إلى 13 رقمًا فقط');
                return;
            }

            const successMsg = document.getElementById('bookingSuccess');
            successMsg.style.display = 'block';
            document.getElementById('bookingForm').reset();

            console.log('✅ طلب حجز جديد:', { name, phone, complaint });

            setTimeout(function() {
                successMsg.style.display = 'none';
            }, 6000);
        }

        // ================================================================
        // إضافة جلسة
        // ================================================================
        function addSession(event) {
            event.preventDefault();
            alert('✅ تم إضافة الجلسة بنجاح!');
            toggleSessionForm();
        }

        // ================================================================
        // إظهار/إخفاء نموذج الجلسة
        // ================================================================
        function toggleSessionForm() {
            const form = document.getElementById('sessionForm');
            form.classList.toggle('show');
        }

        // ================================================================
        // تأكيد الحذف
        // ================================================================
        function confirmDelete() {
            if (confirm('⚠️ هل أنت متأكد من حذف هذا المريض؟ هذا الإجراء لا يمكن التراجع عنه.')) {
                alert('🗑️ تم حذف المريض.');
                showPage('dashboard');
            }
        }

        // ================================================================
        // البحث في الجدول
        // ================================================================
        function filterTable() {
            const input = document.getElementById('searchInput');
            if (!input) return;

            const filter = input.value.toLowerCase();
            const table = document.getElementById('patientsTable');
            if (!table) return;

            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const nameCell = rows[i].getElementsByTagName('td')[1];
                if (nameCell) {
                    const name = nameCell.textContent || nameCell.innerText;
                    rows[i].style.display = name.toLowerCase().includes(filter) ? '' : 'none';
                }
            }
        }

        // ================================================================
        // تحميل الصفحة
        // ================================================================
        document.addEventListener('DOMContentLoaded', function() {
            console.log('✅ تم تحميل عيادة د. محمد محمود مسلّم بنجاح');
        });

		window.addEventListener("scroll", function () {
    const header = document.querySelector("header");

    if (window.scrollY > 50) {
        header.classList.add("scroll");
    } else {
        header.classList.remove("scroll");
    }
});
