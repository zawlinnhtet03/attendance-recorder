 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card card-table comman-shadow">
                <div class="card-body">
                    <div class="table-responsive">                   

                        <!-- Completed Sessions Table -->
                        <h3 class="font-semibold text-gray-1000 dark:text-white mb-6 border-b-4 border-indigo-600 pb-2" style="font-size: 30px;">Participants with Completed Sessions</h3>

                        @if($completedSessions->isEmpty() || !$completedSessions->contains(fn($participant) => $participant->sessions->contains(fn($session) => !is_null($session->check_out_time))))
                            <p class="text-lg text-red-600 dark:text-red-400">No participants have completed sessions.</p>
                        @else
                            <table class="table table-striped table-hover mb-0 border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">姓名</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門核醫及分子影像學會會員</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">職業類別</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">執照編號</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門醫學専科院土</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">工作機構</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">單位工作登編號</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">電子郵件地阯</th>                                     
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">聯絡電話</th>
                                                      
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight text-white">Check-in Time</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight text-white">Check-out Time</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white text-lg">
                                    @foreach($completedSessions as $participant)
                                        @foreach($participant->sessions as $session)
                                            @if($session->check_out_time)
                                                <tr>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->first_name }} {{ $participant->last_name }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                        {{ $participant->is_nuclear_medicine_member ? '是' : '否' }}
                                                    </td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->occupation_category ?? 'N/A' }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->license_number ?? 'N/A' }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                        {{ $participant->is_medical_specialist_member ? '是' : '否' }}
                                                    </td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->organization ?? 'N/A'}}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->work_registration_number ?? 'N/A' }}</td>     
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->email }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->phone_number?? 'N/A' }}</td>

                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $session->check_in_time }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $session->check_out_time }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endif <br><br>


                      <!-- Pending Check-out Sessions Table -->
                      <h3 class="font-semibold text-gray-1000 dark:text-white mb-6 border-b-4 border-indigo-600 pb-2" style="font-size: 30px;">Participants with Pending Check-out</h3>

                        @if($pendingSessions->isEmpty() || !$pendingSessions->contains(fn($participant) => $participant->sessions->contains(fn($session) => is_null($session->check_out_time))))
                            <p class="text-lg text-red-600 dark:text-red-400">No participants have pending check-outs.</p>

                        @else
                       
                            <table class="table table-striped table-hover mb-0 border border-gray-300 table-fixed">
                                    <thead>
                                        <tr>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">姓名</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門核醫及分子影像學會會員</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">職業類別</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">執照編號</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門醫學専科院土</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">工作機構</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">單位工作登編號</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">電子郵件地阯</th>                                     
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">聯絡電話</th>
                                                        
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight text-white">Check-in Time</th>
                                            <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight text-white">Check-out Time</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white text-lg">
                                        @foreach($pendingSessions as $participant)
                                            @foreach($participant->sessions as $session)
                                                @if(is_null($session->check_out_time))
                                                    <tr>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->first_name }} {{ $participant->last_name }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                            {{ $participant->is_nuclear_medicine_member ? '是' : '否' }}
                                                        </td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->occupation_category ?? 'N/A' }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->license_number ?? 'N/A' }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                            {{ $participant->is_medical_specialist_member ? '是' : '否' }}
                                                        </td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->organization ?? 'N/A' }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->work_registration_number ?? 'N/A' }}</td>     
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->email }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->phone_number ?? 'N/A'}}</td>

                                                        
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $session->check_in_time }}</td>
                                                        <td class="text-sm px-3 py-2 border-b border-gray-300 text-red-600 font-semibold">Pending</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                        
                        @endif  <br><br>



                        <!-- Participants who only checked out -->
                        <h3 class="font-semibold text-gray-1000 dark:text-white mb-6 border-b-4 border-indigo-600 pb-2" style="font-size: 30px;">Participants Who Only Checked Out</h3>

                        @if($onlyCheckOutParticipants->isEmpty())
                            <p class="text-lg text-red-600 dark:text-red-400">No participants have only checked out.</p>
                        @else
                            <table class="table table-striped table-hover mb-0 border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">姓名</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門核醫及分子影像學會會員</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">職業類別</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">執照編號</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">是否澳門醫學専科院土</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">工作機構</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">單位工作登編號</th>
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">電子郵件地阯</th>                                     
                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight">聯絡電話</th>

                                        <th class="px-3 py-2 text-left text-green-500 text-base border-b-2 border-gray-300 leading-tight text-white">Check-out Time</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white text-lg">
                                    @foreach($onlyCheckOutParticipants as $participant)
                                        @foreach($participant->sessions as $session)
                                            @if(!is_null($session->check_out_time) && is_null($session->check_in_time))
                                                <tr>
                                                <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->first_name }} {{ $participant->last_name }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                        {{ $participant->is_nuclear_medicine_member ? '是' : '否' }}
                                                    </td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->occupation_category ?? 'N/A' }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->license_number ?? 'N/A' }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">
                                                        {{ $participant->is_medical_specialist_member ? '是' : '否' }}
                                                    </td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->organization ?? 'N/A'}}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->work_registration_number ?? 'N/A' }}</td>     
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->email }}</td>
                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $participant->phone_number ?? 'N/A'}}</td>


                                                    <td class="text-sm px-3 py-2 border-b border-gray-300">{{ $session->check_out_time }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
