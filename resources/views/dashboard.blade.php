<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard  admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"><br>
                <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                    <input class="form-control form-control-lg" type="text" name="search"  value="{{ old('search', $search) }}" placeholder="ค้นหาจากเลขประจำตัวประชาชนนักเรียน" class="border border-gray-300 px-4 py-2">
                    {{-- <input type="text" name="name" class="form-control" aria-label="Sizing example input" id="name" aria-describedby="inputGroup-sizing-default" value="{{ old('name', $students->name ?? '') }}"> --}}
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">ค้นหา</button>
                </form>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ลำดับ</th>
                            <th class="border border-gray-300 px-4 py-2">เลขประจำตัวประชาชน</th>
                            <th class="border border-gray-300 px-4 py-2">ชื่อ-สกุล</th>
                            <th class="border border-gray-300 px-4 py-2">ลำดับชั้น</th>
                            <th class="border border-gray-300 px-4 py-2">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            {{-- <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td> --}}
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->nationalid }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->typetitle->typetitle}}{{ $student->name }}&nbsp;&nbsp;{{ $student->surname }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $student->classlevel->classlevel ?? 'ไม่ระบุ'}}</td>
                            {{-- <td class="border border-gray-300 px-4 py-2">
                                
                            </td> --}}
                            <td class="border border-gray-300 px-4 py-2">
                               <a href="{{ route('studentsauth.pdf', $student->id) }}"  class="bg-green-500 text-white px-4 py-2 rounded-md">ดาวน์โหลด PDF</a> |
                                <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">แก้ไข</a> |
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
    {{-- Table สำหรับ Student4 --}}
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"><br>
            <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                <input class="form-control form-control-lg" type="text" name="search"  value="{{ old('search', $search) }}" placeholder="ค้นหาจากเลขประจำตัวประชาชนนักเรียน" class="border border-gray-300 px-4 py-2">
                {{-- <input type="text" name="name" class="form-control" aria-label="Sizing example input" id="name" aria-describedby="inputGroup-sizing-default" value="{{ old('name', $students->name ?? '') }}"> --}}
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">ค้นหา</button>
            </form>
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ลำดับ</th>
                <th class="border border-gray-300 px-4 py-2">เลขประจำตัวประชาชน</th>
                <th class="border border-gray-300 px-4 py-2">ชื่อ-สกุล</th>
                <th class="border border-gray-300 px-4 py-2">ลำดับชั้น</th>
                <th class="border border-gray-300 px-4 py-2">การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student4s as $student4)
            <tr>
                {{-- <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td> --}}
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration + ($student4s->currentPage() - 1) * $student4s->perPage() }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student4->nationalid }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student4->typetitle->typetitle}}{{ $student4->name }}&nbsp;&nbsp;{{ $student4->surname }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student4->classlevel->classlevel ?? 'ไม่ระบุ'}}</td>
                {{-- <td class="border border-gray-300 px-4 py-2">
                    
                </td> --}}
                <td class="border border-gray-300 px-4 py-2">
                   <a href="{{ route('students4auth.pdf', $student4->id) }}"  class="bg-green-500 text-white px-4 py-2 rounded-md">ดาวน์โหลด PDF</a> |
                    <a href="{{ route('students4.edit', $student4->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">แก้ไข</a> |
                    <form action="{{ route('students4.destroy', $student4->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $student4s->links() }}
    </div>
</div>
</div>
</x-app-layout>