@extends('layout.home')
@section('title', 'لوحة التحكم - د. محمد محمود مسلّم')
@section('contact')

<div id="page-dashboard" class="page active">

    <section class="dashboard">
        <div class="container">

            <div class="section-header">
                <span class="section-tag">لوحة التحكم</span>
                <h2> مرحباً د. محمد </h2>
                <p>نظرة عامة على جميع المرضى وحالاتهم</p>
            </div>
            <img class="drimg" style="height: 100px" src="{{ asset('assets/images/SharedScreenshot.jpg') }}">

            <!-- الإحصائيات -->
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="number" id="stat-total">{{ $patients->count() }}</span>
                    <img src="{{ asset('assets/images/Screenshot 2026-09-02 122428.jpg') }}" alt="Patients Icon"
                        class="stat-icon">
                    <span class="label">إجمالي المرضى</span>
                </div>
                <div class="stat-card">
                    <span class="number" id="stat-new">{{ $patients->where('status', 'جديد')->count() }}</span>
                    <img src="{{ asset('assets/images/co.jpg') }}" alt="Patients Icon" class="stat-icon">
                    <span class="label">مرضى جدد</span>
                </div>

                <div class="stat-card">
                    <span class="number"
                        id="stat-contacted">{{ $patients->where('status', 'تم التواصل')->count() }}</span>
                    <img src="{{ asset('assets/images/Screenshot 2026-09-02 121652.jpg') }}" alt="Patients Icon"
                        class="stat-icon">
                    <span class="label">📞 تم التواصل</span>
                </div>
                <div class="stat-card">
                    <span class="number"
                        id="stat-review">{{ $patients->where('status', 'قيد المراجعة')->count() }}</span>
                    <img src="{{ asset('assets/images/Screenshot 2026-09-02 121553.jpg') }}" alt="Patients Icon"
                        class="stat-icon">
                    <span class="label">قيد المراجعة</span>
                </div>
                <div class="stat-card">
                    <span class="number" id="stat-completed">{{ $patients->where('status', 'مكتمل')->count() }}</span>
                    <img src="{{ asset('assets/images/Screenshot 2026-09-02 141520.jpg') }}" alt="Patients Icon"
                        class="stat-icon">
                    <span class="label">✅ مكتمل</span>
                </div>
            </div>

            <!-- البحث -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="🔍 بحث باسم المريض..." onkeyup="filterTable()" />
            </div>

            <!-- الجدول -->
            <div class="table-wrapper">
                <table id="patientsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $index => $patient)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $patient->fullname }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ ($patient->preferred_date) ?: '—' }}</td>

                                <td>
                                    <select class="status-select" data-id="{{ $patient->id }}">
                                        @php
                                            $statuses = [
                                                'جديد' => '🆕 جديد',
                                                'تم التواصل' => '📞 تم التواصل',
                                                'قيد المراجعة' => '⏳ قيد المراجعة',
                                                'مكتمل' => '✅ مكتمل'
                                            ];
                                        @endphp

                                        @foreach ($statuses as $key => $label)
                                            <option value="{{ $key }}" {{ $patient->status === $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <a class="btn-small btn-view" href="{{ route('patient', ['id' => $patient->id]) }}">👁️
                                        عرض</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center; padding:24px;">لا يوجد مرضى مسجلون بعد</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="margin-top:20px; display:flex; gap:12px; flex-wrap:wrap;">
                <a class="btn-primary" href="{{ route('booking.index') }}">➕ إضافة مريض جديد</a>
                <a class="btn-outline" href="{{ route('patients.export') }}"
                    onclick="alert('📥 جاري تصدير التقرير...')">📥 تصدير Excel</a>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.status-select').forEach(select => {
                select.addEventListener('change', function () {
                    const patientId = this.dataset.id;
                    const newStatus = this.value;
                    const selectElement = this;

                    selectElement.style.opacity = '0.5';

                    fetch(`/patients/${patientId}/update-status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                        .then(response => response.json())
                        .then(data => {
                            selectElement.style.opacity = '1';
                            if (data.success) {
                                // إعادة تحميل الصفحة تلقائياً لضمان تحديث الإحصائيات وجداول البيانات بشكل صحيح ودقيق
                                location.reload();
                            }
                        })
                        .catch(error => {
                            selectElement.style.opacity = '1';
                            console.error('حدث خطأ:', error);
                            alert('فشل تحديث الحالة');
                        });
                });
            });
        });
    </script>
</div>
@stop