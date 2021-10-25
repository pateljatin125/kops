@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-body">
                    <div class="box-body">
                        @if ($message = Session::get('success'))
                        <?php Session::forget('success'); ?>
                        <h5 class="error_success" style="color:red;">{{ $message }}</h5>
                        @endif
                    </div>

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            ITEM GROUP RELATIONSHIP  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    BUILD RELATIONSHIP
                                </a></span>
                        </div>
                        
                        
                        
                        
                        
                            <div style="display:none;" id="modalForRelationship">
                                <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="relationshipModal" tabindex="-1" role="dialog" aria-labelledby="relationshipModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="relationshipModal">Relationship details</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" id="relationshipBody">
                                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                            
                            
                            
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <span id="success"></span>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Groups</th>
                                            <th>Select Items</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Groups</th>
                                            <th>Select Items</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($itemgroups as $itemgroup)
                                        <?php 
                                        $itemsInGroups = DB::table('item_group_relation')->where('group_id', $itemgroup->id)->get();
                                        $itemsinGroup = array();
                                        foreach($itemsInGroups as $itemsInGroup)
                                        {
                                            $itemsinGroup = unserialize($itemsInGroup->items);
                                        }
                                        
                                        
                                       
                                        
                                        ?>
                                        <tr>
                                            <td><a style="margin-top:5px;" class="btn btn-primary relationshipdetails" id="Relationship#{{ $itemgroup->id }}">{{ $itemgroup->group_name }}</a></td>
                                            <td><select class="itemselection" name="items[]" multiple="multiple" style="widht:100%;" id="items#{{ $itemgroup->id }}">
                                              @foreach ($items as $item)
                                                <option value="{{ $item->id }}" <?php if(in_array($item->id,$itemsinGroup)) { echo "selected"; } ?>>{{ $item->name }}</option>
                                              @endforeach
                                            </select></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $itemgroups->links() }}
                            </div>
                        </div>
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .select2.select2-container
    {
        width:100%!important;
    }
</style>
@endsection
