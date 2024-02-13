                        <div class="panel-body">
                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<!-- <th width="10%" data-orderable="false"></th> -->
                                        <th class="text-nowrap">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($pages as $db)
                                     
                                    <tr class="odd gradeX" id="content{{ $db->id }}">

                                        <td>
                                            <strong>Title</strong> : {{$db->title}}<br>
                                            <strong>Shortener url</strong> : {{$db->shortener_url}}<br>
                                            <strong>Original url</strong> : {{$db->original_url}}
                                            <hr/>
                                            <strong>Create Date</strong> : {{ $db->created_at->diffForHumans() }}<hr/>

                                            <div class="m-t-10">
                                                <a href="javascript::void(0)" class="btn btn-danger" id="content_del{{ $db->id }}"><i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i> Trash</a>

                                            </div>

                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>