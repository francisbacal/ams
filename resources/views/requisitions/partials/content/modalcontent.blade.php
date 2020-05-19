<div class="container-fluid modalcontainer">
    <div id="requestLoader" class="spinneroverlay">

        <div class="spinner-border" role="status">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="col">
                        <div class="container m-0 p-0">
                            <div class="row">
                                <div class="col-auto">
                                    <p>
                                        <strong>Status:</strong>
                                        <span id="requestStatus" class="ml-2 badge
                                    @if ($requisition->requisition_status_id == 1)
                                        badge-warning
                                    @elseif ($requisition->requisition_status_id == 2)
                                        badge-info
                                    @elseif ($requisition->requisition_status_id == 3)
                                        badge-success
                                    @else
                                        badge-danger
                                    @endif
                                    ">{{ $requisition->status->name }}</span>
                                    </p>
                                </div>
                                <!--====== <EDIT REQUEST STATUS FOR ADMIN> ======-->
                                @role('admin')
                                <div class="col mb-3">
                                    <form action="#" method="post" class="d-inline">
                                        <div class="d-flex ml-3">
                                            <div class="col-4">
                                                <select name="requisition_status_id"
                                                    class="form-control form-control-sm custom-select"
                                                    id="editRequestStatus">
                                                    @foreach ($requisition_statuses as $requisition_status)
                                                    <option value="{{ $requisition_status->id }}"
                                                        {{ ($requisition_status->id == $requisition->requisition_status_id) ? "Selected" : "" }}>
                                                        {{ $requisition_status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-primary ml-3 updateRequestStatusBtn"
                                                data-url="requisitions/" data-id="{{ $requisition->id }}">Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!--====== <\EDIT REQUEST STATUS FOR ADMIN> ======-->
                                @endrole
                            </div>
                        </div>
                        <p>
                            <strong>Requestor:</strong>
                            <span class="ml-2">{{ $requisition->user->firstname }} {{ $requisition->user->lastname }}</span>
                        </p>
                        <p>
                            <strong>Requested Date:</strong>
                            <span class="ml-2">{{ $requisition->requested_date }}</span>
                        </p>

                        <p>
                            <strong>Additional Notes: </strong>
                            <span class="ml-2">{{ $requisition->notes }}</span>
                        </p>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>
                                        Asset/s Requested
                                    </th>
                                    <th class="text-center" style="width: 20%">
                                        Code
                                    </th>
                                    <th class="text-center">
                                        Description
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requisition->assets as $asset)

                                <tr>
                                    <td>{{ $asset->name }}</td>
                                    <td class="text-center">{{ $asset->code }}</td>
                                    <td>{{ $asset->description }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
