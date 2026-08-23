@extends('layout.home')
@section('title', 'لوحة التحكم - د. محمد محمود مسلّم')
@section('contact')
<div id="page-dashboard" class="page active">

    <section class="dashboard">
        <div class="container">

            <div class="section-header">
                <span class="section-tag">لوحة التحكم</span>
                <h2>👨‍⚕️ مرحباً د. مسلّم</h2>
                <p>نظرة عامة على جميع المرضى وحالاتهم</p>
            </div>

            <!-- الإحصائيات -->
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="number">{{ $patients->count() }}</span>
                    <span class="label">👥 إجمالي المرضى</span>
                </div>
                <div class="stat-card">
                    <span class="number">5</span>
                    <span class="label">🆕 مرضى جدد</span>
                </div>
                <div class="stat-card">
                    <span class="number">3</span>
                    <span class="label">⏳ قيد المراجعة</span>
                </div>
                <div class="stat-card">
                    <span class="number">4</span>
                    <span class="label">📞 تم التواصل</span>
                </div>
                <div class="stat-card">
                    <span class="number">0</span>
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
                                <td>{{ optional($patient->preferred_date)->format('d-m-Y') ?: '—' }}</td>
                                <td><span class="status-badge status-new">{{ $patient->complaint_type }}</span></td>
                                <td>
                                    <a class="btn-small btn-view"
                                        href="{{ route('patient', ['id' => $patient->id]) }}">👁️ عرض</a>
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
                <button class="btn-primary" onclick="showPage('booking')">➕ إضافة مريض جديد</button>
                <button class="btn-outline" onclick="alert('📥 جاري تصدير التقرير...')">📥 تصدير Excel</button>
            </div>

        </div>
    </section>

</div>
@stop