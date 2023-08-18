Name :
                            {{-- {{ $order->receiver_name == null ? $order->customer->business_name : $order->receiver_name }} --}}
                            {{$order->customer->first_name}} {{$order->customer->last_name}}
                            <br>
                            Address :
                            {{-- {{ $order->receiver_address == null ? $order->customer->address : $order->receiver_address }} --}}
                            {{$order->customer->address}}
                            <br>
                            Phone :
                            {{-- {{ $order->receiver_phone == null ? $order->customer->phone : $order->receiver_phone }} --}}
                            {{$order->customer->phone}}
                            <br>
                            Email :
                            {{-- {{ $order->receiver_email == null ? $order->customer->email : $order->receiver_email }} --}}
                            {{$order->customer->email}}
                            <br>
                            Remark : 








                            <p><strong>Order Information:</strong><br>
                                Order ID: {{ $order->order_number == null ? str()->random(12) : $order->order_number }} <br>
                                Order Date : {{ $order->created_at->format('m/y/d') }} <br>
                                Order Status : {{ $order->status }} <br>
                                Payment Status : {{ $order->payment_status }} <br>
                                Payment Type : {{ $order->payment_method }} <br>
                            </p>






                            <thead class="border-b ">
                                <tr class="bg-gray-100 ">
                                    <th class="text-center">Products</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Unit price</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>



                             @php
                            $sub = 0;
                        @endphp

    
                        <tbody>
                            @foreach ($order->details as $data)
                                @php
                                    $sub += $data->unit_price * $data->request_quantity;
                                @endphp
                          
                                <tr>
                                    <td>
                                        <div class="flex flex-wrap flex-row items-center">
                                            <div class="self-center"><img class="h-8 w-8" src="{{$data->product->image}}"></div>
                                            <div class="leading-5  flex-1 ltr:ml-2 rtl:mr-2 mb-1">
                                                {{ $data->product->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $data->request_quantity }}</td>
                                    <td class="text-center">{{ $data->unit_price }} BDT</td>
                                    <td class="text-center">{{ $data->unit_price * $data->received_quantity }} BDT</td>
                                </tr>
                            @endforeach
                        </tbody>