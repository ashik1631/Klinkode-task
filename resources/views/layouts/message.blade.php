                    <!--validation-->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--validation end-->

                    @if (Session::has('message'))
                        <div class="alert alert-{{ session('type')==='success' ? 'success': 'danger' }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif
