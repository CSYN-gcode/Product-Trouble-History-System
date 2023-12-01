@php $layout = 'layouts.super_user_layout'; @endphp
@auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp
@endauth

@extends($layout)
@section('title', 'Dashboard')

{{-- CONTENT PAGE--}}
@section('content_page')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Report Settings</h4>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Reports-tab" data-toggle="tab" href="#Reports" role="tab" aria-controls="Reports" aria-selected="true">Generate Report</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ActionPlan-tab" data-toggle="tab" href="#ActionPlan" role="tab" aria-controls="ActionPlan" aria-selected="false">Action Plan Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                    
                                    <!-- CURRENT FY TAB -->
                                    <div class="tab-pane fade show active" id="Reports" role="tabpanel" aria-labelledby="Reports-tab">
                                      
                                        <div class="card-body">
                                            <h5>Report Preview
                                                <span style="margin-left: 100px; margin-bottom: 10px">
                                                    <!-- EXPORT TO EXCEL -->
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalExport">Generate Excel Report</button>
                                                    {{-- <a  href="{{ route('export') }}"><button class="btn btn-primary" style="height: 40px"><i class="fas fa-file-download">&nbsp;</i>Generate Excel Report</button></a> &nbsp; --}}
                                                    {{-- <button class="btn btn-info" data-toggle="modal" data-target="#modalreportdetails" id="btnShowPastFYModal">Report Details</button> --}}
                                                    <!-- EXPORT TO EXCEL -->
                                                </span>
                                            </h5><br>

                                            <!-- PAST FY FOR REPORT MODAL START -->
                                            <div class="modal fade" id="modalExport">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <h4 class="modal-title">Generate Excel Report</h4>
                                                            <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        {{-- <form id="form_Export_Past_Fy" action="{{ route('export_past_fy') }}"> --}}
                                                        <form id="form_Export">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Action Plan of Month</label>
                                                                            <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                                                                id="month" style="width: 100%;">
                                                                                <option value="" disabled selected>Select Month</option>
                                                                                <option value="9">January</option>
                                                                                <option value="10">February</option>
                                                                                <option value="11">March</option>
                                                                                <option value="0">April</option>
                                                                                <option value="1">May</option>
                                                                                <option value="2">June</option>
                                                                                <option value="3">July</option>
                                                                                <option value="4">August</option>
                                                                                <option value="5">September</option>
                                                                                <option value="6">October</option>
                                                                                <option value="7">November</option>
                                                                                <option value="8">December</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button id="btnExportFile" class="btn btn-primary"><i id="iBtnDownloadPastFyIcon" class="fas fa-file-download" ></i> Download</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PAST FY FOR REPORT MODAL END -->

                                            <!-- PAST FY FOR REPORT MODAL START -->
                                            <div class="modal fade" id="modalreportdetails">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <h4 class="modal-title">Key-4 Excel Report Details & Calculations</h4>
                                                            <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <table class="table table-sm table-bordered table-striped table-hover display nowrap">
                                                                            {{-- ENERGY --}}
                                                                            <tr>
                                                                                <th colspan="4" style="background-color: rgb(255, 105, 97);"><center>Energy Consumption</center></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Position (in excel)</th>
                                                                                <th>Calculation</th>
                                                                                <th>Description</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Past FY) Actual</td>
                                                                                <td>C</td>
                                                                                <td>Sum of actual /(divided by) No. of months</td>
                                                                                <td>Actual consumption of the past FY in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Current FY) Target</td>
                                                                                <td>D</td>
                                                                                <td>Sum of target /(divided by) No. of months</td>
                                                                                <td>Target consumption of the current FY in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Monthly Target</td>
                                                                                <td>E3-P3</td>
                                                                                <td>Monthly target consumption</td>
                                                                                <td>Current FY monthly target consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>KwH/Consumption</td>
                                                                                <td>E4-P4</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Monthly Actual</td>
                                                                                <td>E5-P5</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Average</td>
                                                                                <td>Q</td>
                                                                                <td>Sum of actual /(divided by) No. of months</td>
                                                                                <td>Current FY monthly entries in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Target</td>
                                                                                <td>E20-P20</td>
                                                                                <td>Monthly target consumption</td>
                                                                                <td>Current FY monthly target consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Actual</td>
                                                                                <td>E21-P21</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>TRI COLOR CHART Data</td>
                                                                                <td>E23-P23</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            {{-- WATER --}}
                                                                            <tr>
                                                                                <th colspan="4" style="background-color: rgb(139, 211, 230);"><center>Water Consumption</center></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Position (in excel)</th>
                                                                                <th>Calculation</th>
                                                                                <th>Description</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Past FY) Actual</td>
                                                                                <td>C</td>
                                                                                <td>Sum of actual /(divided by) No. of months</td>
                                                                                <td>Actual consumption of the past FY in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Current FY) Target</td>
                                                                                <td>D</td>
                                                                                <td>Sum of target /(divided by) No. of months</td>
                                                                                <td>Target consumption of the current FY in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Monthly Target</td>
                                                                                <td>E14-P14</td>
                                                                                <td>Monthly target consumption</td>
                                                                                <td>Current FY monthly target consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Current FY)Total Consumption:Factory 1 & 2</td>
                                                                                <td>E15-P15</td>
                                                                                <td>Sum of Monthly Actual of Fac 1 & 2</td>
                                                                                <td>Current FY sum of monthly actual of Fac 1 & 2.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>(Current FY)FY 2022 Total Manpower</td>
                                                                                <td>E16-P16</td>
                                                                                <td>Sum of Monthly Manpower Count of Fac 1 & 2</td>
                                                                                <td>Current FY sum of monthly manpower count of Fac 1 & 2.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Consumption per headcount(cu.meter)/Month</td>
                                                                                <td>E17-P17</td>
                                                                                <td>Sum of Actual/(divided by) Sum of Manpower Count</td>
                                                                                <td>Quotient of Actual consumption in sum and Manpower Count in sum.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Average</td>
                                                                                <td>Q</td>
                                                                                <td>Sum of actual /(divided by) No. of months</td>
                                                                                <td>Current FY monthly entries in "Average".</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Target</td>
                                                                                <td>E20-P20</td>
                                                                                <td>Monthly target consumption</td>.
                                                                                <td>Current FY monthly target consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Actual</td>
                                                                                <td>E21-P21</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>TRI COLOR CHART Data</td>
                                                                                <td>E23-P23</td>
                                                                                <td>Monthly actual consumption</td>
                                                                                <td>Current FY monthly actual consumption.</td>
                                                                            </tr>
                                                                            
                                                                        </table>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PAST FY FOR REPORT MODAL END -->

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="energy-tab" data-toggle="tab" href="#energy" role="tab" aria-controls="energy" aria-selected="true">Energy Consumption</a>
                                                </li>
            
                                                <li class="nav-item">
                                                    <a class="nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water Consumption</a>
                                                </li>
            
                                                <li class="nav-item">
                                                    <a class="nav-link" id="ink-tab" data-toggle="tab" href="#ink" role="tab" aria-controls="ink" aria-selected="false">Ink Consumption</a>
                                                </li>
            
                                                <li class="nav-item">
                                                    <a class="nav-link" id="paper-dash-tab" data-toggle="tab" href="#paper-dash" role="tab" aria-controls="paper" aria-selected="false">Paper Consumption</a>
                                                </li>
            
                                            </ul>
            
                                            <div class="tab-content" id="myTabContent">
                                                <!-- DASHBOARD ENERGY TAB -->
                                                <div class="tab-pane fade show active" id="energy" role="tabpanel" aria-labelledby="energy-tab">
                                                    {{-- <h5 class="mt-3 ml-2">Energy Consumption</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year" id="selFiscalYearEnergy" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    <br>
                                                    <div class="table-responsive">
                                                        <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Energy Consumption KwH/Mo</th>
                                                                    {{-- <th style="width: 6.66%;" class="march-past-fy"></th> --}}
                                                                    <th style="width: 6.66%;" class="april-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="may-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="june-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="july-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="august-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="september-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="october-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="november-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="december-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="january-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="february-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="march-current-fy"></th>
                                                                    <th style="width: 6.66%;" class="total-current-fy">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Target</td>
                                                                    {{-- <td class="march-target-past text-left" id="march-target-past"></td> --}}
                                                                    <td class="april-target text-left" id="april-target"></td>
                                                                    <td class="may-target text-left" id="may-target"></td>
                                                                    <td class="june-target text-left" id="june-target"></td>
                                                                    <td class="july-target text-left" id="july-target"></td>
                                                                    <td class="august-target text-left" id="august-target"></td>
                                                                    <td class="september-target text-left" id="september-target"></td>
                                                                    <td class="october-target text-left" id="october-target"></td>
                                                                    <td class="november-target text-left" id="november-target"></td>
                                                                    <td class="december-target text-left" id="december-target"></td>
                                                                    <td class="january-target text-left" id="january-target"></td>
                                                                    <td class="february-target text-left" id="february-target"></td>
                                                                    <td class="march-target text-left" id="march-target"></td>
                                                                    <td class="total-target text-left" id="total-target"></td>
                                                                </tr>
                                                            </tbody>
                                                           
                                                                <tr>
                                                                    <td>Actual</td>
                                                                    {{-- <td class="march-actual-past text-left" id="march-actual-past"></td> --}}
                                                                    <td class="april-actual text-left" id="april-actual"></td>
                                                                    <td class="may-actual text-left" id="may-actual"></td>
                                                                    <td class="june-actual text-left" id="june-actual"></td>
                                                                    <td class="july-actual text-left" id="july-actual"></td>
                                                                    <td class="august-actual text-left" id="august-actual"></td>
                                                                    <td class="september-actual text-left" id="september-actual"></td>
                                                                    <td class="october-actual text-left" id="october-actual"></td>
                                                                    <td class="november-actual text-left" id="november-actual"></td>
                                                                    <td class="december-actual text-left" id="december-actual"></td>
                                                                    <td class="january-actual text-left" id="january-actual"></td>
                                                                    <td class="february-actual text-left" id="february-actual"></td>
                                                                    <td class="march-actual text-left" id="march-actual"></td>
                                                                    <td class="total-actual text-left" id="total-actual"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td>|</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="diff-energy-ave"></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
            
                                                                
                                                                <tr>
                                                                    <td>Tricolor Chart Data</td>
                                                                    <td class="energy-actual-tricolor-april"></td>
                                                                    <td class="energy-actual-tricolor-may"></td>
                                                                    <td class="energy-actual-tricolor-june"></td>
                                                                    <td class="energy-actual-tricolor-july"></td>
                                                                    <td class="energy-actual-tricolor-august"></td>
                                                                    <td class="energy-actual-tricolor-september"></td>
                                                                    <td class="energy-actual-tricolor-october"></td>
                                                                    <td class="energy-actual-tricolor-november"></td>
                                                                    <td class="energy-actual-tricolor-december"></td>
                                                                    <td class="energy-actual-tricolor-january"></td>
                                                                    <td class="energy-actual-tricolor-february"></td>
                                                                    <td class="energy-actual-tricolor-march"></td>
                                                                    <td class="energy-actual-tricolor-total"></td>
                                                                    {{-- <td></td> --}}
                                                                </tr>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- DASHBOARD WATER TAB -->
                                                <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
                                                    {{-- <h5 class="mt-3 ml-2">Water Consumption</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearWater" name="fiscal_year" id="selFiscalYearWater" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    <br>
                                                    <div class="table-responsive">
                                                        <table id="tblViewWaterConsumption" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Water Consumption</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-water-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-water-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-water-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-water-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-water-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-water-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-water-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-water-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
            
                                                <!-- DASHBOARD INK BOD TAB -->
                                                <div class="tab-pane fade" id="ink" role="tabpanel" aria-labelledby="ink-tab">
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - BOD</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkBOD" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionBOD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - BOD</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-bod-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-bod-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-bod-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-bod-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-bod-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-bod-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-bod-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK BOD TAB END -->
            
                                                    <!-- DASHBOARD INK IAS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_ias" role="tabpanel" aria-labelledby="ink_ias-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - IAS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkIAS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                                
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionIAS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - IAS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-ias-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ias-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ias-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ias-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ias-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ias-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ias-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK IAS TAB END -->
            
                                                    <!-- DASHBOARD INK FIN TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_fin" role="tabpanel" aria-labelledby="ink_fin-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - FIN</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkFIN" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionFIN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - FIN</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-fin-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-fin-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-fin-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-fin-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-fin-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-fin-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-fin-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK FIN TAB END -->
            
                                                    <!-- DASHBOARD INK HRD TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_hrd" role="tabpanel" aria-labelledby="ink_hrd-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - HRD</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkHRD" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionHRD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - HRD</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-hrd-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-hrd-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-hrd-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-hrd-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-hrd-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-hrd-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-hrd-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK HRD TAB END -->
            
                                                    <!-- DASHBOARD INK ESS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_ess" role="tabpanel" aria-labelledby="ink_ess-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - ESS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkESS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionESS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - ESS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-ess-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ess-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ess-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ess-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ess-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ess-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ess-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK ESS TAB END -->
            
                                                    <!-- DASHBOARD INK LOG TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_log" role="tabpanel" aria-labelledby="ink_log-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - LOG</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkLOG" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionLOG" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - LOG</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-log-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-log-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-log-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-log-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-log-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-log-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-log-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK LOG TAB END -->
            
                                                    <!-- DASHBOARD INK FAC TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_fac" role="tabpanel" aria-labelledby="ink_fac-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - FAC</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkFAC" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionFAC" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - FAC</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-fac-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-fac-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-fac-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-fac-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-fac-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-fac-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-fac-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK FAC TAB END -->
            
                                                    <!-- DASHBOARD INK ISS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_iss" role="tabpanel" aria-labelledby="ink_iss-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - ISS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkISS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionISS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - ISS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-iss-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-iss-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-iss-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-iss-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-iss-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-iss-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-iss-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK ISS TAB END -->
            
                                                    <!-- DASHBOARD INK QAD TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_qad" role="tabpanel" aria-labelledby="ink_qad-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - QAD</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkQAD" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionQAD" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - EMS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-qad-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-qad-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-qad-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-qad-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-qad-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-qad-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-qad-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK QAD TAB END -->
            
                                                    <!-- DASHBOARD INK EMS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_ems" role="tabpanel" aria-labelledby="ink_ems-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - EMS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkEMS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionEMS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - EMS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-ems-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ems-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ems-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ems-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ems-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ems-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ems-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK EMS TAB END -->
            
                                                    <!-- DASHBOARD INK TS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_ts" role="tabpanel" aria-labelledby="ink_ts-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - TS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkTS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionTS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - TS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ts-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-ts-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK TS TAB END -->
            
                                                    <!-- DASHBOARD INK CN TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_cn" role="tabpanel" aria-labelledby="ink_cn-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - CN</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkCN" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionCN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - CN</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-cn-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-cn-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK CN TAB END -->
            
                                                    <!-- DASHBOARD INK YF TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_yf" role="tabpanel" aria-labelledby="ink_yf-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - YF</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkYF" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionYF" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - YF</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-yf-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-yf-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD INK YF TAB END -->
            
                                                    <!-- DASHBOARD INK PPS TAB -->
                                                    {{-- <div class="tab-pane fade" id="ink_pps" role="tabpanel" aria-labelledby="ink_pps-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Ink Consumption - PPS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearInk" name="fiscal_year" id="selFiscalYearInkPPS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
            
                                                    <div class="table-responsive">
                                                        <table id="tblViewInkConsumptionPPS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Ink Consumption - PPS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-ink-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-ink-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-pps-actual-target"></td>
                                                                </tr>
                                                    
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-ink-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-ink-pps-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                    <!-- DASHBOARD INK PPS TAB END -->
            
                                                <!-- DASHBOARD PAPER SG TAB -->
                                                <div class="tab-pane fade" id="paper-dash" role="tabpanel" aria-labelledby="paper-dash-tab">
                                                    {{-- <h5 class="mt-3 ml-2">Paper Consumption - SG</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearPaper" name="fiscal_year" id="selFiscalYearPaper" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    <div class="table-responsive">
                                                        <table id="tblViewPaperConsumption" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Paper Consumption - SG</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-paper-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
            
                                                    <!-- DASHBOARD PAPER TS TAB -->
                                                    {{-- <div class="tab-pane fade" id="paper-prod-ts" role="tabpanel" aria-labelledby="paper-prod-ts-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Paper Consumption - TS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearPaperTS" name="fiscal_year" id="selFiscalYearPaperTS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                            
                                                    <div class="table-responsive">
                                                        <table id="tblViewPaperConsumptionTS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Paper Consumption - TS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-paper-ts-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-ts-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-ts-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-ts-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-ts-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-ts-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-ts-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
                                                    <!-- DASHBOARD PAPER CN TAB -->
                                                    {{-- <div class="tab-pane fade" id="paper-prod-cn" role="tabpanel" aria-labelledby="paper-prod-cn-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Paper Consumption - CN</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearPaperCN" name="fiscal_year" id="selFiscalYearPaperCN" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                            
                                                    <div class="table-responsive">
                                                        <table id="tblViewPaperConsumptionCN" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Paper Consumption - CN</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-paper-cn-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-cn-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-cn-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-cn-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-cn-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-cn-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-cn-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div>
                                                     --}}
                                                    <!-- DASHBOARD PAPER YF TAB -->
                                                    {{-- <div class="tab-pane fade" id="paper-prod-yf" role="tabpanel" aria-labelledby="paper-prod-yf-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Paper Consumption - YF</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearPaperYF" name="fiscal_year" id="selFiscalYearPaperYF" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                            
                                                    <div class="table-responsive">
                                                        <table id="tblViewPaperConsumptionYF" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Paper Consumption - YF</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-paper-yf-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-yf-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-yf-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-yf-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-yf-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-yf-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-yf-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- </div> --}}
            
                                                    <!-- DASHBOARD PAPER PPS TAB -->
                                                    {{-- <div class="tab-pane fade" id="paper-prod-pps" role="tabpanel" aria-labelledby="paper-prod-pps-tab"> --}}
                                                    {{-- <h5 class="mt-3 ml-2">Paper Consumption - PPS</h5>
                                                    <div class="text-left mt-4 d-flex flex-row">
                                                        <div class="form-group ml-3 col-2">
                                                            <label><strong>Fiscal Year :</strong></label>
                                                                <select class="form-control select2bs4 selectYearPaperPPS" name="fiscal_year" id="selFiscalYearPaperPPS" style="width: 100%;">
                                                                    <!-- Code generated -->
                                                                </select>
                                                        </div>
                                                    </div><br> --}}
                                                    
                                                    <hr style="height:3px;border:none;color:#333;background-color:#333;">
                                                    
                                            
                                                    <div class="table-responsive">
                                                        <table id="tblViewPaperConsumptionPPS" class="table table-sm table-bordered table-striped table-hover display nowrap" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 6.66%;">Paper Consumption - PPS</th>
                                                                    {{-- <th class="march-paper-past-fy"  style="width: 6.66%;"></th> --}}
                                                                    <th class="april-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="may-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="june-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="july-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="august-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="september-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="october-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="november-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="december-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="january-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="february-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th class="march-paper-pps-current-fy" style="width: 6.66%;"></th>
                                                                    <th style="width: 6.66%;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width: 6.66%;">Target</td>
                                                                    {{-- <td class="march-paper-past-fy-target" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-pps-current-fy-target" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Actual</td>
                                                                    {{-- <td class="march-paper-past-fy-actual" style="width: 6.66%;"></td> --}}
                                                                    <td class="april-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="may-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="june-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="july-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="august-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="september-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="october-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="november-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="december-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="january-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="february-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="march-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                    <td class="total-paper-pps-current-fy-actual" style="width: 6.66%;"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">|</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-pps-actual-target"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-pps-actual-target"></td>
                                                                </tr>
            
                                                                <tr>
                                                                    <td style="width: 6.66%;">Tricolor Chart Data</td>
                                                                    {{-- <td style="width: 6.66%;"></td> --}}
                                                                    <td style="width: 6.66%;" class="april-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="may-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="june-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="july-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="august-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="september-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="october-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="november-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="december-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="january-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="february-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="march-paper-pps-tricolor"></td>
                                                                    <td style="width: 6.66%;" class="total-paper-pps-tricolor"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>   
                                                       
                                    </div>
                    
                                    <!-- PAST FY TAB -->
                                    <div class="tab-pane fade" id="ActionPlan" role="tabpanel" aria-labelledby="ActionPlan-tab">

                                            <div class="card-body">
                                                <h5>Report Preview</h5>
                
                                                {{-- <div class="tab-pane fade show active" id="monthly-target" role="tabpanel" aria-labelledby="monthly-target-tab"> --}}
                                                <div class="text-left mt-4  d-flex flex-row" id="TEST">
                                                    <div class="form-group ml-3 col-2">
                                                        <label><strong>Fiscal Year :</strong></label>
                                                        <select class="form-control select2bs4 selectYearEnergy" name="fiscal_year"
                                                            id="selFiscalYearEnergy" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                    </div>
                                                    {{-- <div class="form-group ml-3 col-2">
                                                        <label><strong>Month :</strong></label>
                                                        <select class="form-control select2bs4 selectMonthEnergy" name="month_value"
                                                            id="selMonthEnergy" style="width: 100%;">
                                                            <!-- Code generated -->
                                                        </select>
                                                    </div> --}}
                                                    <div class="form-group ml-3 col-2">
                                                        <label><strong>Month :</strong></label>
                                                        <select class="form-control select2bs4 selectMonthEnergy" name="month_value"
                                                            id="selMonthEnergy" style="width: 100%;">
                                                            <option value="0" disabled selected>Select Month</option>
                                                            <option value="" >All</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>

                                                    <div style="margin-left: auto">
                                                        
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalActionPlan"
                                                            id="btnShowActionPlan"><i class="fa fa-plus fa-md"></i> Add Monthly
                                                            Target</button> &nbsp;
            
                                                    </div>
                                                </div><br>
                
                                                <div class="table-responsive" style="overflow: scroll; height: 500px;" >
                                                    <table id="tblActionPlan"
                                                        class="table table-md table-bordered table-striped table-hover text-center"
                                                        style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Action</th>
                                                                <th>Fiscal Year</th>
                                                                <th>Person</th>
                                                                <th>Months</th>
                                                                <th>Remarks</th>
                                                                <th><i class="fa fa-cogs fa-md"></i></th>
                
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                    
                                </div>
                            </div>

                        </div>
                    </div>  
                </div>
            </div>
        </section> 
    </div>

    <!-- ADD ENERGY MONTHLY TARGET -->
    <div class="modal fade" data-backdrop="static" id="modalActionPlan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="ActionPlanChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddActionPlan">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId" style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="actionplan_id" id="energyId" style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Action</label>
                                    <input type="text" class="form-control" name="action" id="txtAddAction">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Person</label>
                                    <input type="text" class="form-control" name="person" id="txtAddPerson">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddMonth" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" name="remarks" id="txtAddRemarks">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddActionPlan" class="btn btn-primary"><i
                                id="iBtnAddActionPlan" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY TARGET END -->

@endsection
{{-- JS CONTENT --}}
@section('js_content')
    <script type="text/javascript">
            $(window).on('load', function() {
                // $('.sidebartoggler').collapse('toggle');sidebar-collapse
                $("body").removeClass('sidebar-open');
                $("body").addClass('sidebar-collapse');
            });

            //Reset Modal When Close
            $('#modalExport').on('hidden.bs.modal', function () {
            $('#modalExport form')[0].reset();
            });
        
            //Close Modal When Save
    
        $(document).ready(function () {
            $('#btnExportFile').on('click', function (e) {
                e.preventDefault();
                // console.log('qwe');
                let month = $('#month').val();
                // console.log(test);

                window.location.href = "export/"+month;

                $('#modalExport').modal('hide');
            });

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            GetFiscalYear();
            // GetMonthsFilter($('.selectMonthEnergy'));
            GetFiscalYearFilter($('.selectYearEnergy'));


            // $("#selMonthEnergy").on('change', function() {
            //     dataTableEnergyConsumptions.column(0).search($(this).val()).draw();
            // });

            $("#selMonthEnergy").on('change', function() {
                dataTableActionPlan.column(0).search($(this).val()).draw();
            });

            $("#selFiscalYearEnergy").on('change', function() {
                dataTableActionPlan.column(1).search($(this).val()).draw();
            });
            
            $('#btnShowActionPlan').on('click', function(e) {
                $('input[name="actionplan_id"]', $("#formAddActionPlan")).val('');
                $('input[name="action"]', $("#formAddActionPlan")).val('');
                $('input[name="person"]', $("#formAddActionPlan")).val('');
                $('input[name="remarks"]', $("#formAddActionPlan")).val('');
                $('select[name="month"]', $("#formAddActionPlan")).val(0).trigger('change');
                // $('select[name="month"]', $("#formAddActionPlan")).val(0).trigger('change');
                $('select[name="month"]', $("#formAddActionPlan")).prop('disabled', false);

                $('#ActionPlanChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Action Plan Information');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });

            //===== EDIT ENERGY CONSUMPTION =====
            $('#tblActionPlan').on('click', '.EditActionPlan', function() {
                let fiscalyearid = $(this).attr('get_fiscal_year_id');
                let id = $(this).attr('actionplan-id');

                $("input[name='fiscal_year'", $("#formAddActionPlan")).val(fiscalyearid);
                $("input[name='energy_id'", $("#formAddActionPlan")).val(id);
                $('#ActionPlanChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Action Plan Information');
                $('select[name="month"]', $("#formAddActionPlan")).prop('disabled', false);

                console.log('Action Plan ID:', id);
                console.log('Fiscal year ID:', fiscalyearid);

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetActionPlanByID(id);
            });

            function GetActionPlanByID(ActionPlanId) {
                $.ajax({
                    url: "get_action_plan_by_id",
                    method: "get",
                    data: {
                        ActionPlanId: ActionPlanId,
                    },
                    dataType: "json",
                    success: function(response) {
                        let formAddActionPlan = $('#formAddActionPlan');
                        // let formAddEnergyActual = $('#formAddEnergyActual');
                        let action_plan_details = response['result'];
                        if (action_plan_details.length > 0) {
                            $('select[name="month"]', formAddActionPlan).val(action_plan_details[0].month).trigger('change');
                            // $('select[name="month_consumption"]', formAddEnergyActual).val(action_plan_details[0].month).trigger('change');
                            $("#txtAddAction").val(action_plan_details[0].action);
                            $("#txtAddPerson").val(action_plan_details[0].person);
                            $("#txtAddRemarks").val(action_plan_details[0].remarks);
                            
                        } else {
                            toastr.warning('No record found!');
                        }
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
                });
            }
            // $('#sidebartoggler').collapse('toggle');
            
            // var ctrs = 0;
            
            // console.log(ctrs);
            // setTimeout(() => {
            //     ctrs = ctrs + 1;
            //     window.location.reload();
            // }, 1000);

            function GetFiscalYearFilter() {
                let result = '<option value="0" selected disabled> -- Select Fiscal Year -- </option>';

                $.ajax({
                    url: 'get_fiscal_year_for_filter',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        result = '<option value="0" selected disabled> -- Loading -- </option>';
                        // cboElement.html(result);
                        $(".selectYearEnergy").html(result);
                    },
                    success: function (response) {
                        result = '';
                        let year = response['years'];

                        if (year.length > 0) { // true
                            result += '<option value="0" selected disabled> Select Fiscal Year </option>';
                            // result += '<option value=""> All </option>';
                            for (let index = 0; index < year.length; index++) {
                                result += '<option value="' + year[index].fiscal_year + '">' + year[index].fiscal_year + '</option>';
                            }
                        }
                        else {
                            result = '<option value="0" selected disabled> No record found </option>';
                        }
                        // cboElement.html(result);
                        $(".selectYearEnergy").html(result);
                        $(".selectYearPaper").html(result);
                        $(".selectYearWater").html(result);
                        $(".selectYearInk").html(result);
                        $(".selectYearPaperTS").html(result);
                        $(".selectYearPaperCN").html(result);
                        $(".selectYearPaperYF").html(result);
                        $(".selectYearPaperPPS").html(result);
                    }
                });
            }

            //============= GET ENERGY DATA FOR DASHBOARD ===================================================
            function GetCurrentFYEnergyData() {
                $.ajax({
                    method: "get",
                    url: "get_current_energy_data",
                    data: {
                        fiscal_year: $('#selFiscalYearEnergy').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        var pastYear = response['pastFY'];
                        var pastYear = Number(pastYear);
                        var currentYear = response['currentFY'];
                        var currentYear = Number(currentYear);
                        //=========
                        var iconPastMarch = response['iconPastMarch'];
                        var iconCurrentApril = response['iconCurrentApril'];
                        var iconCurrentMay = response['iconCurrentMay'];
                        var iconCurrentJune = response['iconCurrentJune'];
                        var iconCurrentJuly = response['iconCurrentJuly'];
                        var iconCurrentAugust = response['iconCurrentAugust'];
                        var iconCurrentSeptember = response['iconCurrentSeptember'];
                        var iconCurrentOctober = response['iconCurrentOctober'];
                        var iconCurrentNovember = response['iconCurrentNovember'];
                        var iconCurrentDecember = response['iconCurrentDecember'];
                        var iconCurrentJanuary = response['iconCurrentJanuary'];
                        var iconCurrentFebruary = response['iconCurrentFebruary'];
                        var iconCurrentMarch = response['iconCurrentMarch'];
                        //=========

                        //=========
                        var pastMarchTarget = response['marchTargetPastFy'];
                        var pastMarchActual = response['marchActualPastFy'];

                        var currentAprilTarget = response['aprilTargetCurrentFy'];
                        var currentAprilActual = response['aprilActualCurrentFy'];

                        var currentMayTarget = response['mayTargetCurrentFy'];
                        var currentMayActual = response['mayActualCurrentFy'];

                        var currentJuneTarget = response['juneTargetCurrentFy'];
                        var currentJuneActual = response['juneActualCurrentFy'];

                        var currentJulyTarget = response['julyTargetCurrentFy'];
                        var currentJulyActual = response['julyActualCurrentFy'];

                        var currentAugustTarget = response['augustTargetCurrentFy'];
                        var currentAugustActual = response['augustActualCurrentFy'];
                        var currentSeptemberTarget = response['septemberTargetCurrentFy'];
                        var currentSeptemberActual = response['septemberActualCurrentFy'];
                        var currentOctoberTarget = response['octoberTargetCurrentFy'];
                        var currentOctoberActual = response['octoberActualCurrentFy'];
                        var currentNovemberTarget = response['novemberTargetCurrentFy'];
                        var currentNovemberActual = response['novemberActualCurrentFy'];
                        var currentDecemberTarget = response['decemberTargetCurrentFy'];
                        var currentDecemberActual = response['decemberActualCurrentFy'];
                        var currentJanuaryTarget = response['januaryTargetCurrentFy'];
                        var currentJanuaryActual = response['januaryActualCurrentFy'];
                        var currentFebruaryTarget = response['februaryTargetCurrentFy'];
                        var currentFebruaryActual = response['februaryActualCurrentFy'];
                        var currentMarchTarget = response['marchTargetCurrentFy'];
                        var currentMarchActual = response['marchActualCurrentFy'];
                        //========

                        // console.log(currentYear + 1);
                        if(currentYear != null) {
                            $('.april-current-fy').html('April ' + currentYear); 
                            $('.may-current-fy').html('May ' + currentYear); 
                            $('.june-current-fy').html('June ' + currentYear); 
                            $('.july-current-fy').html('July ' + currentYear); 
                            $('.august-current-fy').html('August ' + currentYear); 
                            $('.september-current-fy').html('September ' + currentYear); 
                            $('.october-current-fy').html('October ' + currentYear); 
                            $('.november-current-fy').html('November ' + currentYear); 
                            $('.december-current-fy').html('December ' + currentYear); 
                            $('.january-current-fy').html('January ' + (currentYear + 1)); 
                            $('.february-current-fy').html('February ' + (currentYear + 1)); 
                            $('.march-current-fy').html('March ' + (currentYear + 1)); 
                        } else {
                            $('.april-current-fy').html(' ');
                            $('.may-current-fy').html(' ');
                            $('.june-current-fy').html(' ');
                            $('.july-current-fy').html(' ');
                            $('.august-current-fy').html(' ');
                            $('.september-current-fy').html(' ');
                            $('.october-current-fy').html(' ');
                            $('.november-current-fy').html(' ');
                            $('.december-current-fy').html(' ');
                            $('.january-current-fy').html(' ');
                            $('.february-current-fy').html(' ');
                            $('.march-current-fy').html(' ');
                        }

                        //===== CURRENT FY MONTHS =============
                        if(currentAprilTarget != null) {
                            $('.april-target').html(currentAprilTarget); 
                        } else {
                            $('.april-target').html('-'); 
                        }

                        if(currentAprilActual == 0 || currentAprilActual == null) {
                            $('.april-actual').html('-'); 
                            $('.energy-actual-tricolor-april').html('-');

                        } else if(currentAprilActual != null) {
                            $('.april-actual').html(currentAprilActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentApril);
                            $('.energy-actual-tricolor-april').html(currentAprilActual);
                            
                        }  

                        //=======
                        if(currentMayTarget != null) {
                            $('.may-target').html(currentMayTarget); 
                        } else {
                            $('.may-target').html('-'); 
                        }

                        if(currentMayActual == 0 || currentMayActual == null) {
                            $('.may-actual').html('-'); 
                            $('.energy-actual-tricolor-may').html('-');

                            
                        } else if(currentMayActual != null){
                            $('.may-actual').html(currentMayActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMay);
                            $('.energy-actual-tricolor-may').html(currentMayActual);
                        }

                        //=======
                        if(currentJuneTarget != null) {
                            $('.june-target').html(currentJuneTarget); 
                        } else {
                            $('.june-target').html('-'); 
                        }

                        if(currentJuneActual == 0 || currentJuneActual == null) {
                            $('.june-actual').html('-'); 
                            $('.energy-actual-tricolor-june').html('-');

                            
                        } else if(currentJuneActual != null) {
                            $('.june-actual').html(currentJuneActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJune);
                            $('.energy-actual-tricolor-june').html(currentJuneActual);
                        }

                        //=======
                        if(currentJulyTarget != null) {
                            $('.july-target').html(currentJulyTarget); 
                        } else {
                            $('.july-target').html('-'); 
                        }

                        if(currentJulyActual == 0 || currentJulyActual == null) {
                            $('.july-actual').html('-'); 
                            $('.energy-actual-tricolor-july').html('-');

                            
                        } else if(currentJulyActual != null) {
                            $('.july-actual').html(currentJulyActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJuly);
                            $('.energy-actual-tricolor-july').html(currentJulyActual);

                        }

                        //=======
                        if(currentAugustTarget != null) {
                            $('.august-target').html(currentAugustTarget); 
                        } else {
                            $('.august-target').html('-'); 
                        }

                        if(currentAugustActual == 0 || currentAugustActual == null) {
                            $('.august-actual').html('-'); 
                            $('.energy-actual-tricolor-august').html('-');
                            
                        } else if(currentAugustActual != null) {
                            $('.august-actual').html(currentAugustActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentAugust);
                            $('.energy-actual-tricolor-august').html(currentAugustActual);
                        }

                        //=======
                        if(currentSeptemberTarget != null) {
                            $('.september-target').html(currentSeptemberTarget); 
                        } else {
                            $('.september-target').html('-'); 
                        }

                        if(currentSeptemberActual == 0 || currentSeptemberActual == null) {
                            $('.september-actual').html('-'); 
                            $('.energy-actual-tricolor-september').html('-');
                            
                        } else if(currentSeptemberActual != null) {
                            $('.september-actual').html(currentSeptemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentSeptember);
                            $('.energy-actual-tricolor-september').html(currentSeptemberActual);
                        }

                        //=======
                        if(currentOctoberTarget != null) {
                            $('.october-target').html(currentOctoberTarget); 
                        } else {
                            $('.october-target').html('-'); 
                        }

                        if(currentOctoberActual == 0 || currentOctoberActual == null) {
                            $('.october-actual').html('-'); 
                            $('.energy-actual-tricolor-october').html('-');
                            
                        } else if(currentOctoberActual != null) {
                            $('.october-actual').html(currentOctoberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentOctober);
                            $('.energy-actual-tricolor-october').html(currentOctoberActual);
                        }

                        //=======
                        if(currentNovemberTarget != null) {
                            $('.november-target').html(currentNovemberTarget); 
                        } else {
                            $('.november-target').html('-'); 
                        }

                        if(currentNovemberActual == 0 || currentNovemberActual == null) {
                            $('.november-actual').html('-'); 
                            $('.energy-actual-tricolor-november').html('-');
                            
                        } else if(currentNovemberActual != null) {
                            $('.november-actual').html(currentNovemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentNovember);
                            $('.energy-actual-tricolor-november').html(currentNovemberActual);
                        }

                        //=======
                        if(currentDecemberTarget != null) {
                            $('.december-target').html(currentDecemberTarget); 
                        } else {
                            $('.december-target').html('-'); 
                        }

                        if (currentDecemberActual == 0 || currentDecemberActual == null) {
                            $('.december-actual').html('-'); 
                            $('.energy-actual-tricolor-december').html('-');
                        }
                        else if(currentDecemberActual != null) {
                            $('.december-actual').html(currentDecemberActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentDecember);
                            $('.energy-actual-tricolor-december').html(currentDecemberActual);
                        //   console.log(currentDecemberActual);
                        } 

                        //=======
                         if(currentJanuaryTarget != null) {
                            $('.january-target').html(currentJanuaryTarget); 
                        } else {
                            $('.january-target').html('-'); 
                        }

                        if(currentJanuaryActual == 0 || currentJanuaryActual == null) {
                            $('.january-actual').html('-'); 
                            $('.energy-actual-tricolor-january').html('-');
                            
                        } else if(currentJanuaryActual != null) {
                            $('.january-actual').html(currentJanuaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentJanuary);
                            $('.energy-actual-tricolor-january').html(currentJanuaryActual);
                        }

                        //=======
                        if(currentFebruaryTarget != null) {
                            $('.february-target').html(currentFebruaryTarget); 
                        } else {
                            $('.february-target').html('-'); 
                        }

                        if(currentFebruaryActual == 0 || currentFebruaryActual == null) {
                            $('.february-actual').html('-'); 
                            $('.energy-actual-tricolor-february').html('-');
                            
                        } else if(currentFebruaryActual != null) {
                            $('.february-actual').html(currentFebruaryActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentFebruary);
                            $('.energy-actual-tricolor-february').html(currentFebruaryActual);
                        }

                         //=======
                         if(currentMarchTarget != null) {
                            $('.march-target').html(currentMarchTarget); 
                        } else {
                            $('.march-target').html('-'); 
                        }

                        if(currentMarchActual == 0 || currentMarchActual == null) {
                            $('.march-actual').html('-'); 
                            $('.energy-actual-tricolor-march').html('-');
                        } else if(currentMarchActual != null) {
                            $('.march-actual').html(currentMarchActual + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconCurrentMarch);
                            $('.energy-actual-tricolor-march').html(currentMarchActual);
                        }
                        //===== CURRENT FY MONTHS =============

                        var currentAprilTargetNum = null;
                        var currentMayTargetNum = null;
                        var currentJuneTargetNum = null;
                        var currentJulyTargetNum = null;
                        var currentAugustTargetNum = null;
                        var currentSeptemberTargetNum = null;
                        var currentOctoberTargetNum = null;
                        var currentNovemberTargetNum = null;
                        var currentDecemberTargetNum = null;
                        var currentJanuaryTargetNum = null;
                        var currentFebruaryTargetNum = null;
                        var currentMarchTargetNum = null;

                        if(currentAprilTarget != null) {
                            var currentAprilTargetNum = Number(currentAprilTarget.replace(/,/g, ''));
                            // console.log(currentAprilTarget);
                        } 
                        if (currentMayTarget != null) {
                            var currentMayTargetNum = Number(currentMayTarget.replace(/,/g, ''));
                            // console.log(currentMayTarget);
                        }
                        if (currentJuneTarget != null) {
                            var currentJuneTargetNum = Number(currentJuneTarget.replace(/,/g, ''));
                        }
                        if (currentJulyTarget != null) {
                            var currentJulyTargetNum = Number(currentJulyTarget.replace(/,/g, ''));
                        }
                        if (currentAugustTarget != null) {
                            var currentAugustTargetNum = Number(currentAugustTarget.replace(/,/g, ''));
                        }
                        if (currentSeptemberTarget != null) {
                            var currentSeptemberTargetNum = Number(currentSeptemberTarget.replace(/,/g, ''));
                        }
                        if (currentOctoberTarget != null) {
                            var currentOctoberTargetNum = Number(currentOctoberTarget.replace(/,/g, ''));
                        }
                        if (currentNovemberTarget != null) {
                            var currentNovemberTargetNum = Number(currentNovemberTarget.replace(/,/g, ''));
                        }
                        if (currentDecemberTarget != null) {
                            var currentDecemberTargetNum = Number(currentDecemberTarget.replace(/,/g, ''));
                        }
                        if (currentJanuaryTarget != null) {
                            var currentJanuaryTargetNum = Number(currentJanuaryTarget.replace(/,/g, ''));
                        }
                        if (currentFebruaryTarget != null) {
                            var currentFebruaryTargetNum = Number(currentFebruaryTarget.replace(/,/g, ''));
                        }
                        if (currentMarchTarget != null) {
                            var currentMarchTargetNum = Number(currentMarchTarget.replace(/,/g, ''));
                        }
                      
                         var totalTargetNum = currentAprilTargetNum + currentMayTargetNum + currentJuneTargetNum + currentJulyTargetNum + currentAugustTargetNum + currentSeptemberTargetNum + currentOctoberTargetNum + currentNovemberTargetNum + currentDecemberTargetNum + currentJanuaryTargetNum + currentFebruaryTargetNum + currentMarchTargetNum;
                        

                        var data = response['energyConsumption'];
                        var targetCount = [];
                        var actualCount = [];

                        for(var x = 0; x < data.length; x++) {
                            targetData = data[x].target;
                            actualData = data[x].actual;
                           
                            targetCount.push(Number(targetData));
                            actualCount.push(Number(actualData));
                          
                        }
                        
                        // console.log(targetCount.length);

                         var targetAve = totalTargetNum / targetCount.length;
                         var targetAverage = targetAve.toLocaleString('en');
                        //  console.log(totalTargetNum);

                        var targetAverage = targetAve.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
                        //  var totalTargetNumFormatted = totalTargetNum.toLocaleString('en');

                        // if(totalTargetNumFormatted != 0) {
                        //     $('#total-target').html(totalTargetNumFormatted);
                        // }
                        // else {
                        //     $('#total-target').html('-');
                        // }

                        if(targetCount.length != 0) {
                            $('.total-target').html(targetAverage);
                        }
                        else {
                            $('.total-target').html('-');
                        }

                        var currentAprilActualNum = null;
                        var currentMayActualNum = null;
                        var currentJuneActualNum = null;
                        var currentJulyActualNum = null;
                        var currentAugustActualNum = null;
                        var currentSeptemberActualNum = null;
                        var currentOctoberActualNum = null;
                        var currentNovemberActualNum = null;
                        var currentDecemberActualNum = null; 
                        var currentJanuaryActualNum = null;
                        var currentFebruaryActualNum = null;
                        var currentMarchActualNum = null;

                        if(currentAprilActual != null) {
                            var currentAprilActualNum = Number(currentAprilActual.replace(/,/g, ''));
                        }
                        if(currentMayActual != null) {
                            var currentMayActualNum = Number(currentMayActual.replace(/,/g, ''));
                        }
                        if(currentJuneActual != null) {
                            var currentJuneActualNum = Number(currentJuneActual.replace(/,/g, ''));
                        }
                        if(currentJulyActual != null) {
                            var currentJulyActualNum = Number(currentJulyActual.replace(/,/g, ''));
                        }
                        if(currentAugustActual != null) {
                            var currentAugustActualNum = Number(currentAugustActual.replace(/,/g, ''));
                        }
                        if(currentSeptemberActual != null) {
                            var currentSeptemberActualNum = Number(currentSeptemberActual.replace(/,/g, ''));
                        }
                        if(currentOctoberActual != null) {
                            var currentOctoberActualNum = Number(currentOctoberActual.replace(/,/g, ''));
                        }
                        if(currentNovemberActual != null) {
                            var currentNovemberActualNum = Number(currentNovemberActual.replace(/,/g, ''));
                        }
                        if(currentDecemberActual != null) {
                            var currentDecemberActualNum = Number(currentDecemberActual.replace(/,/g, ''));
                        }
                        if(currentJanuaryActual != null) {
                            var currentJanuaryActualNum = Number(currentJanuaryActual.replace(/,/g, ''));
                        }
                        if(currentFebruaryActual != null) {
                            var currentFebruaryActualNum = Number(currentFebruaryActual.replace(/,/g, ''));
                        }
                        if(currentMarchActual != null) {
                            var currentMarchActualNum = Number(currentMarchActual.replace(/,/g, ''));
                        }

                        var totalActualNum = currentAprilActualNum + currentMayActualNum + currentJuneActualNum + currentJulyActualNum + currentAugustActualNum + currentSeptemberActualNum + currentOctoberActualNum + currentNovemberActualNum + currentDecemberActualNum + currentJanuaryActualNum + currentFebruaryActualNum + currentMarchActualNum;


                        var actualAve = totalActualNum / actualCount.length;

                        // var totalActualNumFormatted = totalActualNum.toLocaleString('en');
                        // var actualAve = actualAve.toFixed(0);
                        var actualAverage = actualAve.toLocaleString('en');
                        var aveDiff = targetAve - actualAve;
                        // console.log(aveDiff);
                        var actualAverage = actualAve.toLocaleString('en');
                        // var aveDiff = aveDiff.toLocaleString('en');
                        var actualAverage = actualAve.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");

                        var aveDiff = aveDiff.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");

                        // var aveDiff = parseFloat(aveDiff).toFixed(2);
                        
                        // console.log(aveDiff);

                        if(actualCount.length != 0) {
                            $('.diff-energy-ave').html(aveDiff);                           
                        } else {
                            $('.diff-energy-ave').html('-');                           
                        }


                        if(actualCount.length != 0) {
                            $('#total-actual').html(actualAverage);
                        }
                        else {
                            $('#total-actual').html('-');
                        }

                        if(actualCount.length != 0) {
                            $('.energy-actual-tricolor-total').html(actualAverage);
                        }
                        else {
                            $('.energy-actual-tricolor-total').html('-');
                        }
                    },

                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
                });
            }
            //============= GET ENERGY DATA FOR DASHBOARD ===================================================

            GetCurrentFYEnergyData();

            $('#selFiscalYearEnergy').on('change', function() {
                $('.selectYearEnergy').val($(this).find(":selected").val());
                $(".selectYearEnergy").val();

                GetCurrentFYEnergyData();
                    
                dataTableEnergyConsumptions.draw();
            });

            function GetCurrentFYPaperData() {
                $.ajax({
                    url: 'get_current_paper_data',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        fiscal_year: $('#selFiscalYearPaper').val()
                    },
                    success: function (response) {
                        var currentYear = Number(response['currentYear']);
                        var nextYear = Number(response['currentYear'] + 1);
                        var iconApril = response['iconApril']; 
                        var iconMay = response['iconMay']; 
                        var iconJune = response['iconJune']; 
                        var iconJuly = response['iconJuly']; 
                        var iconAugust = response['iconAugust']; 
                        var iconSeptember = response['iconSeptember']; 
                        var iconOctober = response['iconOctober']; 
                        var iconNovember = response['iconNovember']; 
                        var iconDecember = response['iconDecember']; 
                        var iconJanuary = response['iconJanuary']; 
                        var iconFebruary = response['iconFebruary']; 
                        var iconMarch = response['iconMarch']; 
                        var paperTargetApril = parseFloat(response['paperTargetApril']);
                        var paperActualApril = parseFloat(response['paperActualApril']);
                        var paperTargetMay = parseFloat(response['paperTargetMay']);
                        var paperActualMay = parseFloat(response['paperActualMay']);
                        var paperTargetJune = parseFloat(response['paperTargetJune']);
                        var paperActualJune = parseFloat(response['paperActualJune']);
                        var paperTargetJuly = parseFloat(response['paperTargetJuly']);
                        var paperActualJuly = parseFloat(response['paperActualJuly']);
                        var paperTargetAugust = parseFloat(response['paperTargetAugust']);
                        var paperActualAugust = parseFloat(response['paperActualAugust']);
                        var paperTargetSeptember = parseFloat(response['paperTargetSeptember']);
                        var paperActualSeptember = parseFloat(response['paperActualSeptember']);
                        var paperTargetOctober = parseFloat(response['paperTargetOctober']);
                        var paperActualOctober = parseFloat(response['paperActualOctober']);
                        var paperTargetNovember = parseFloat(response['paperTargetNovember']);
                        var paperActualNovember = parseFloat(response['paperActualNovember']);
                        var paperTargetDecember = parseFloat(response['paperTargetDecember']);
                        var paperActualDecember = parseFloat(response['paperActualDecember']);
                        var paperTargetJanuary = parseFloat(response['paperTargetJanuary']);
                        var paperActualJanuary = parseFloat(response['paperActualJanuary']);
                        var paperTargetFebruary = parseFloat(response['paperTargetFebruary']);
                        var paperActualFebruary = parseFloat(response['paperActualFebruary']);
                        var paperTargetMarch = parseFloat(response['paperTargetMarch']);
                        var paperActualMarch = parseFloat(response['paperActualMarch']);


                        $('.april-paper-current-fy').html('April ' + currentYear);
                        $('.may-paper-current-fy').html('May ' + currentYear);
                        $('.june-paper-current-fy').html('June ' + currentYear);
                        $('.july-paper-current-fy').html('July ' + currentYear);
                        $('.august-paper-current-fy').html('August ' + currentYear);
                        $('.september-paper-current-fy').html('September ' + currentYear);
                        $('.october-paper-current-fy').html('October ' + currentYear);
                        $('.november-paper-current-fy').html('November ' + currentYear);
                        $('.december-paper-current-fy').html('December ' + currentYear);
                        $('.january-paper-current-fy').html('January ' + nextYear);
                        $('.february-paper-current-fy').html('February ' + nextYear);
                        $('.march-paper-current-fy').html('March ' + nextYear);



                        if(paperTargetApril == 0) {
                            $('.april-paper-current-fy-target').html('-');
                        } else {
                            $('.april-paper-current-fy-target').html(paperTargetApril);
                        }

                        if(paperActualApril == 0) {
                            $('.april-paper-current-fy-actual').html('-');
                        } else {
                            $('.april-paper-current-fy-actual').html(paperActualApril + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconApril);
                        }

                        if(paperTargetApril == 0 || paperActualApril == 0) {
                            $('.april-paper-actual-target').html('-');
                        } else {
                            var aprilDifference = paperTargetApril - paperActualApril;
                            var aprilDifference = aprilDifference.toFixed(2);
                            $('.april-paper-actual-target').html(aprilDifference);

                            if(aprilDifference < 0) {
                                $('.may-paper-actual-target').html(aprilDifference);
                                $('.may-paper-actual-target').css('color', 'red');
                            } else {
                                $('.may-paper-actual-target').html(aprilDifference);
                            }
                        }


                        if(paperTargetMay == 0) {
                            $('.may-paper-current-fy-target').html('-');
                        } else {
                            $('.may-paper-current-fy-target').html(paperTargetMay);
                        }

                        if(paperActualMay == 0) {
                            $('.may-paper-current-fy-actual').html('-');
                        } else {
                            $('.may-paper-current-fy-actual').html(paperActualMay + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMay);
                        }

                        if(paperTargetMay == 0 || paperActualMay == 0) {
                            $('.may-paper-actual-target').html('-');
                        } else {
                            var mayDifference = paperTargetMay - paperActualMay;
                            var mayDifference = mayDifference.toFixed(2);

                            if(mayDifference < 0) {
                                $('.may-paper-actual-target').html(mayDifference);
                                $('.may-paper-actual-target').css('color', 'red');
                            } else {
                                $('.may-paper-actual-target').html(mayDifference);
                            }
                        }

                    
                        if(paperTargetJune == 0) {
                            $('.june-paper-current-fy-target').html('-');
                        } else {
                            $('.june-paper-current-fy-target').html(paperTargetJune);
                        }

                        if(paperActualJune == 0) {
                            $('.june-paper-current-fy-actual').html('-');
                        } else {
                            $('.june-paper-current-fy-actual').html(paperActualJune + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJune);
                        }

                        if(paperTargetJune == 0 || paperActualJune == 0) {
                            $('.june-paper-actual-target').html('-');
                        } else {
                            var juneDifference = paperTargetJune - paperActualJune;
                            var juneDifference = juneDifference.toFixed(2);

                            if(juneDifference < 0) {
                                $('.june-paper-actual-target').html(juneDifference);
                                $('.june-paper-actual-target').css('color', 'red');
                            } else {
                                $('.june-paper-actual-target').html(juneDifference);
                            }
                        }


                        if(paperTargetJuly == 0) {
                            $('.july-paper-current-fy-target').html('-');
                        } else {
                            $('.july-paper-current-fy-target').html(paperTargetJuly);
                        }

                        if(paperActualJuly == 0) {
                            $('.july-paper-current-fy-actual').html('-');
                        } else {
                            $('.july-paper-current-fy-actual').html(paperActualJuly + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJuly);
                        }

                        if(paperTargetJuly == 0 || paperActualJuly == 0) {
                            $('.july-paper-actual-target').html('-');
                        } else {
                            var julyDifference = paperTargetJuly - paperActualJuly;
                            var julyDifference = julyDifference.toFixed(2);

                            if(julyDifference < 0) {
                                $('.july-paper-actual-target').html(julyDifference);
                                $('.july-paper-actual-target').css('color', 'red');
                            } else {
                                $('.july-paper-actual-target').html(julyDifference);
                            }
                        }


                        if(paperTargetAugust == 0) {
                            $('.august-paper-current-fy-target').html('-');
                        } else {
                            $('.august-paper-current-fy-target').html(paperTargetAugust);
                        }

                        if(paperActualAugust == 0) {
                            $('.august-paper-current-fy-actual').html('-');
                        } else {
                            $('.august-paper-current-fy-actual').html(paperActualAugust + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconAugust);
                        }

                        if(paperTargetAugust == 0 || paperActualAugust == 0) {
                            $('.august-paper-actual-target').html('-');
                        } else {
                            var augustDifference = paperTargetAugust - paperActualAugust;
                            var augustDifference = augustDifference.toFixed(2);

                            if(augustDifference < 0) {
                                $('.august-paper-actual-target').html(augustDifference);
                                $('.august-paper-actual-target').css('color', 'red');
                            } else {
                                $('.august-paper-actual-target').html(augustDifference);
                            }
                        }


                        if(paperTargetSeptember == 0) {
                            $('.september-paper-current-fy-target').html('-');
                        } else {
                            $('.september-paper-current-fy-target').html(paperTargetSeptember);
                        }

                        if(paperActualSeptember == 0) {
                            $('.september-paper-current-fy-actual').html('-');
                        } else {
                            $('.september-paper-current-fy-actual').html(paperActualSeptember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconSeptember);
                        }

                        if(paperTargetSeptember == 0 || paperActualSeptember == 0) {
                            $('.september-paper-actual-target').html('-');
                        } else {
                            var septemberDifference = paperTargetSeptember - paperActualSeptember;
                            var septemberDifference = septemberDifference.toFixed(2);

                            if(septemberDifference < 0) {
                                $('.september-paper-actual-target').html(septemberDifference);
                                $('.september-paper-actual-target').css('color', 'red');
                            } else {
                                $('.september-paper-actual-target').html(septemberDifference);
                            }
                        }


                        if(paperTargetOctober == 0) {
                            $('.october-paper-current-fy-target').html('-');
                        } else {
                            $('.october-paper-current-fy-target').html(paperTargetOctober);
                        }

                        if(paperActualOctober == 0) {
                            $('.october-paper-current-fy-actual').html('-');
                        } else {
                            $('.october-paper-current-fy-actual').html(paperActualOctober + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconOctober);
                        }

                        if(paperTargetOctober == 0 || paperActualOctober == 0) {
                            $('.october-paper-actual-target').html('-');
                        } else {
                            var octoberDifference = paperTargetOctober - paperActualOctober;
                            var octoberDifference = octoberDifference.toFixed(2);

                            if(octoberDifference < 0) {
                                $('.october-paper-actual-target').html(octoberDifference);
                                $('.october-paper-actual-target').css('color', 'red');
                            } else {
                                $('.october-paper-actual-target').html(octoberDifference);
                            }
                        }


                        if(paperTargetNovember == 0) {
                            $('.november-paper-current-fy-target').html('-');
                        } else {
                            $('.november-paper-current-fy-target').html(paperTargetNovember);
                        }

                        if(paperActualNovember == 0) {
                            $('.november-paper-current-fy-actual').html('-');
                        } else {
                            $('.november-paper-current-fy-actual').html(paperActualNovember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconNovember);
                        }


                        if(paperTargetNovember == 0 || paperActualNovember == 0) {
                            $('.november-paper-actual-target').html('-');
                        } else {
                            var novemberDifference = paperTargetNovember - paperActualNovember;
                            var novemberDifference = novemberDifference.toFixed(2);

                            if(novemberDifference < 0) {
                                $('.november-paper-actual-target').html(novemberDifference);
                                $('.november-paper-actual-target').css('color', 'red');
                            } else {
                                $('.november-paper-actual-target').html(novemberDifference);
                            }
                        }


                        if(paperTargetDecember == 0) {
                            $('.december-paper-current-fy-target').html('-');
                        } else {
                            $('.december-paper-current-fy-target').html(paperTargetDecember);
                        }

                        if(paperActualDecember == 0) {
                            $('.december-paper-current-fy-actual').html('-');
                        } else {
                            $('.december-paper-current-fy-actual').html(paperActualDecember + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconDecember);
                        }

                        if(paperTargetDecember == 0 || paperActualDecember == 0) {
                            $('.december-paper-actual-target').html('-');
                        } else {
                            var decemberDifference = paperTargetDecember - paperActualDecember;
                            var decemberDifference = decemberDifference.toFixed(2);

                            if(decemberDifference < 0) {
                                $('.december-paper-actual-target').html(decemberDifference);
                                $('.december-paper-actual-target').css('color', 'red');
                            } else {
                                $('.december-paper-actual-target').html(decemberDifference);
                            }
                        }


                        if(paperTargetJanuary == 0) {
                            $('.january-paper-current-fy-target').html('-');
                        } else {
                            $('.january-paper-current-fy-target').html(paperTargetJanuary);
                        }

                        if(paperActualJanuary == 0) {
                            $('.january-paper-current-fy-actual').html('-');
                        } else {
                            $('.january-paper-current-fy-actual').html(paperActualJanuary + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconJanuary);
                        }

                        if(paperTargetJanuary == 0 || paperActualJanuary == 0) {
                            $('.january-paper-actual-target').html('-');
                        } else {
                            var januaryDifference = paperTargetJanuary - paperActualJanuary;
                            var januaryDifference = januaryDifference.toFixed(2);

                            if(januaryDifference < 0) {
                                $('.january-paper-actual-target').html(januaryDifference);
                                $('.january-paper-actual-target').css('color', 'red');
                            } else {
                                $('.january-paper-actual-target').html(januaryDifference);
                            }
                        }


                        if(paperTargetFebruary == 0) {
                            $('.february-paper-current-fy-target').html('-');
                        } else {
                            $('.february-paper-current-fy-target').html(paperTargetFebruary);
                        }

                        if(paperActualFebruary == 0) {
                            $('.february-paper-current-fy-actual').html('-');
                        } else {
                            $('.february-paper-current-fy-actual').html(paperActualFebruary + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconFebruary);
                        }

                        if(paperTargetFebruary == 0 || paperActualFebruary == 0) {
                            $('.february-paper-actual-target').html('-');
                        } else {
                            var februaryDifference = paperTargetFebruary - paperActualFebruary;
                            var februaryDifference = februaryDifference.toFixed(2);

                            if(februaryDifference < 0) {
                                $('.february-paper-actual-target').html(februaryDifference);
                                $('.february-paper-actual-target').css('color', 'red');
                            } else {
                                $('.february-paper-actual-target').html(februaryDifference);
                            }
                        }


                        if(paperTargetMarch == 0) {
                            $('.march-paper-current-fy-target').html('-');
                        } else {
                            $('.march-paper-current-fy-target').html(paperTargetMarch);
                        }

                        if(paperActualMarch == 0) {
                            $('.march-paper-current-fy-actual').html('-');
                        } else {
                            $('.march-paper-current-fy-actual').html(paperActualMarch + '&nbsp;&nbsp;&nbsp;&nbsp;' + iconMarch);
                        }


                        if(paperTargetMarch == 0 || paperActualMarch == 0) {
                            $('.march-paper-actual-target').html('-');
                        } else {
                            var marchDifference = paperTargetMarch - paperActualMarch;
                            var marchDifference = marchDifference.toFixed(2);

                            if(marchDifference < 0) {
                                $('.march-paper-actual-target').html(marchDifference);
                                $('.march-paper-actual-target').css('color', 'red');
                            } else {
                                $('.march-paper-actual-target').html(marchDifference);
                            }
                        }

                        var paperTargetTotal = paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary + paperTargetMarch;

                        // console.log(paperTargetMarch);
                        // var paperTargetTotal = parseFloat(paperTargetTotal);
                        var paperTargetTotal = paperTargetTotal.toFixed(2);

                        if(paperTargetTotal == 0) {
                            $('.total-paper-current-fy-target').html('-');
                        } else {
                            $('.total-paper-current-fy-target').html(paperTargetTotal);
                        }


                        var paperActualTotal = paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary + paperActualMarch;

                        var paperActualTotal = paperActualTotal.toFixed(2);

                        if(paperActualTotal == 0) {
                            $('.total-paper-current-fy-actual').html('-');
                        } else {
                            $('.total-paper-current-fy-actual').html(paperActualTotal);
                        }


                        if(paperTargetTotal == 0 || paperActualTotal == 0) {
                            $('.total-paper-actual-target').html('-');
                        } else {
                            var totalDifference = paperTargetTotal - paperActualTotal;
                            var totalDifference = totalDifference.toFixed(2);

                            if(totalDifference < 0) {
                                $('.total-paper-actual-target').html(totalDifference);
                                $('.total-paper-actual-target').css('color', 'red');
                                $('.total-paper-tricolor').html(totalDifference);
                                $('.total-paper-tricolor').css('color', 'red');
                            } else {
                                $('.total-paper-actual-target').html(totalDifference);
                                $('.total-paper-tricolor').html(totalDifference);

                            }
                        }

                    //===== BASED ON EXCEL COMPUTATION ==============
                    //===== SUBTRACT PAPER TARGET FOR APRIL FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR APRIL ==============
                    var aprilTricolor = paperTargetTotal - paperTargetApril + paperActualApril;
                    var aprilTricolor =  Number(aprilTricolor.toFixed(2));
                    //===== SUBTRACT PAPER TARGET FOR APRIL FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR APRIL ==============

                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY) ==============
                    var aprilMayTarget =  paperTargetApril + paperTargetMay;
                    var aprilMayTarget =  Number(aprilMayTarget.toFixed(2));

                    var aprilMayActual =  paperActualApril + paperActualMay;
                    var aprilMayActual =  Number(aprilMayActual.toFixed(2));


                    var mayTricolor = paperTargetTotal - aprilMayTarget + aprilMayActual;
                    var mayTricolor =  Number(mayTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE) ==============
                    var aprilMayJuneTarget =  paperTargetApril + paperTargetMay + paperTargetJune;
                    var aprilMayJuneTarget =  Number(aprilMayJuneTarget.toFixed(2));

                    var aprilMayJuneActual =  paperActualApril + paperActualMay + paperActualJune;
                    var aprilMayJuneActual =  Number(aprilMayJuneActual.toFixed(2));

                    var juneTricolor = paperTargetTotal - aprilMayJuneTarget + aprilMayJuneActual;
                    var juneTricolor =  Number(juneTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE +JULY) ==============
                    var aprilMayJuneJulyTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly;
                    var aprilMayJuneJulyTarget =  Number(aprilMayJuneJulyTarget.toFixed(2));

                    var aprilMayJuneJulyActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly;
                    var aprilMayJuneJulyActual =  Number(aprilMayJuneJulyActual.toFixed(2));

                    var julyTricolor = paperTargetTotal - aprilMayJuneJulyTarget + aprilMayJuneJulyActual;
                    var julyTricolor =  Number(julyTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST) ==============
                    var aprilMayJuneJulyAugustTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust;
                    var aprilMayJuneJulyAugustTarget =  Number(aprilMayJuneJulyAugustTarget.toFixed(2));

                    var aprilMayJuneJulyAugustActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust;
                    var aprilMayJuneJulyAugustActual =  Number(aprilMayJuneJulyAugustActual.toFixed(2));

                    var augustTricolor = paperTargetTotal - aprilMayJuneJulyAugustTarget + aprilMayJuneJulyAugustActual;
                    var augustTricolor =  Number(augustTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember;
                    var aprilMayJuneJulyAugustSeptemberTarget =  Number(aprilMayJuneJulyAugustSeptemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember;
                    var aprilMayJuneJulyAugustSeptemberActual =  Number(aprilMayJuneJulyAugustSeptemberActual.toFixed(2));

                    var septemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberTarget + aprilMayJuneJulyAugustSeptemberActual;
                    var septemberTricolor =  Number(septemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober;
                    var aprilMayJuneJulyAugustSeptemberOctoberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober;
                    var aprilMayJuneJulyAugustSeptemberOctoberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberActual.toFixed(2));

                    var octoberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberTarget + aprilMayJuneJulyAugustSeptemberOctoberActual;
                    var octoberTricolor =  Number(octoberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberActual.toFixed(2));

                    var novemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberActual;
                    var novemberTricolor =  Number(novemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual.toFixed(2));

                    var decemberTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberActual;
                    var decemberTricolor =  Number(decemberTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual.toFixed(2));

                    var januaryTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryActual;
                    var januaryTricolor =  Number(januaryTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual.toFixed(2));

                    var februaryTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryActual;
                    var februaryTricolor =  Number(februaryTricolor.toFixed(2));


                    //===== SUBTRACT PAPER TARGET FOR (APRIL + MAY + JUNE +JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY + MARCH) FROM PAPER TARGET TOTAL THEN ADD PAPER ACTUAL FOR (APRIL + MAY + JUNE + JULY + AUGUST + SEPTEMBER + OCTOBER + NOVEMBER + DECEMBER + JANUARY + FEBRUARY + MARCH) ==============
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget =  paperTargetApril + paperTargetMay + paperTargetJune + paperTargetJuly + paperTargetAugust + paperTargetSeptember + paperTargetOctober + paperTargetNovember + paperTargetDecember + paperTargetJanuary + paperTargetFebruary + paperTargetMarch;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget.toFixed(2));

                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual =  paperActualApril + paperActualMay + paperActualJune + paperActualJuly + paperActualAugust + paperActualSeptember + paperActualOctober + paperActualNovember + paperActualDecember + paperActualJanuary + paperActualFebruary + paperActualMarch;
                    var aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual =  Number(aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual.toFixed(2));

                    var marchTricolor = paperTargetTotal - aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchTarget + aprilMayJuneJulyAugustSeptemberOctoberNovemberDecemberJanuaryFebruaryMarchActual;
                    var marchTricolor =  Number(marchTricolor.toFixed(2));


                    var totalTricolor = '';

                
                        if(aprilTricolor != 0) {
                            $('.april-paper-tricolor').html(aprilTricolor);
                        } else {
                            $('.april-paper-tricolor').html('-');
                        }


                        if(mayTricolor != 0) {
                            $('.may-paper-tricolor').html(mayTricolor);
                        } else {
                            $('.may-paper-tricolor').html('-');
                        }
                    

                        if(juneTricolor != 0) {
                            $('.june-paper-tricolor').html(juneTricolor);
                        } else {
                            $('.june-paper-tricolor').html('-');
                        }

                        if(julyTricolor != 0) {
                            $('.july-paper-tricolor').html(julyTricolor);
                        } else {
                            $('.july-paper-tricolor').html('-');
                        }

                        if(augustTricolor != 0) {
                            $('.august-paper-tricolor').html(augustTricolor);
                        } else {
                            $('.august-paper-tricolor').html('-');
                        }

                        if(septemberTricolor != 0) {
                            $('.september-paper-tricolor').html(septemberTricolor);
                        } else {
                            $('.september-paper-tricolor').html('-');
                        }

                        if(octoberTricolor != 0) {
                            $('.october-paper-tricolor').html(octoberTricolor);
                        } else {
                            $('.october-paper-tricolor').html('-');
                        }

                        if(novemberTricolor != 0) {
                            $('.november-paper-tricolor').html(novemberTricolor);
                        } else {
                            $('.november-paper-tricolor').html('-');
                        }


                        if(decemberTricolor != 0) {
                            $('.december-paper-tricolor').html(decemberTricolor);
                        } else {
                            $('.december-paper-tricolor').html('-');
                        }

                        if(januaryTricolor != 0) {
                            $('.january-paper-tricolor').html(januaryTricolor);
                        } else {
                            $('.january-paper-tricolor').html('-');
                        }

                        if(februaryTricolor != 0) {
                            $('.february-paper-tricolor').html(februaryTricolor);
                        } else {
                            $('.february-paper-tricolor').html('-');
                        }

                        if(marchTricolor != 0) {
                            $('.march-paper-tricolor').html(marchTricolor);
                        } else {
                            $('.march-paper-tricolor').html('-');
                        }


                        // if(totalTricolor != 0) {
                        //     $('.total-paper-tricolor').html(totalDifference);
                        // } else {
                        //     $('.total-paper-tricolor').html('-');
                        // }
 
                    }
                });
            }

            GetCurrentFYPaperData();

            $('#selFiscalYearPaper').on('change', function() {
                $('.selectYearPaper').val($(this).find(":selected").val());
                $(".selectYearPaper").val();

                GetCurrentFYPaperData();
                    
                dataTablePaperConsumptions.draw();
            });

            GetCurrentFYWaterData();

            // GetCurrentFYWaterData();

            $('#selFiscalYearWater').on('change', function() {
                $('.selectYearWater').val($(this).find(":selected").val());
                $('.selectYearWater').val();

                GetCurrentFYWaterData();
                    
                dataTableWaterConsumptions.draw();
            });

            // Get Current FY Ink Data

            // GetCurrentFYInkData();

            // $('#selFiscalYearInk').on('change', function() {
            //     $('.selectYearInk').val($(this).find(":selected").val());
            //     $('.selectYearInk').val();

            //     GetCurrentFYInkData();
                    
            //     dataTableInkConsumptions.draw();
            // });

            // GetCurrentFYInkData();

            // $('#selFiscalYearInk').on('change', function() {
            //     $('.selectYearInk').val($(this).find(":selected").val());
            //     $('.selectYearInk').val();

            //     GetCurrentFYInkData();
                    
            //     dataTableInkConsumptions.draw();
            // });

            GetCurrentFYPaperDataTS();

            $('#selFiscalYearPaperTS').on('change', function() {
                $('.selectYearPaperTS').val($(this).find(":selected").val());
                $('.selectYearPaperTS').val();

                GetCurrentFYPaperDataTS();
                    
                dataTablePaperConsumptionsTS.draw();
            });

            GetCurrentFYPaperDataCN();

            $('#selFiscalYearPaperCN').on('change', function() {
                $('.selectYearPaperCN').val($(this).find(":selected").val());
                $('.selectYearPaperCN').val();

                GetCurrentFYPaperDataCN();
                    
                dataTablePaperConsumptionsCN.draw();
            });

            GetCurrentFYPaperDataPPS();

            $('#selFiscalYearPaperPPS').on('change', function() {
                $('.selectYearPaperPPS').val($(this).find(":selected").val());
                $('.selectYearPaperPPS').val();

                GetCurrentFYPaperDataPPS();
                    
                dataTablePaperConsumptionsPPS.draw();
            });


            GetCurrentFYPaperDataYF();

            $('#selFiscalYearPaperYF').on('change', function() {
                $('.selectYearPaperYF').val($(this).find(":selected").val());
                $('.selectYearPaperYF').val();

                GetCurrentFYPaperDataYF();
                    
                dataTablePaperConsumptionsYF.draw();
            });

      

             //===== DATATABLES OF ENERGY CONSUMPTION ================
             var dataTableEnergyConsumptions = $("#tblViewEnergyConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================


            //===== DATATABLES OF PAPER CONSUMPTION ================
            var dataTablePaperConsumptions = $("#tblViewPaperConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER CONSUMPTION END ================


            //===== DATATABLES OF WATER CONSUMPTION ================
            var dataTableWaterConsumptions = $("#tblViewWaterConsumption").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF WATER CONSUMPTION END ================

            //===== DATATABLES OF INK CONSUMPTION ================
            // var dataTableInkConsumptions = $("#tblViewInkConsumption").DataTable({
            //     "processing": false,
            //     "paging": false,
            //     "searching": false,
            //     "responsive": true,
            //     "order": [0, 'desc'],
            //     "bSort": false,
            //     "bInfo" : false,
            // });
            //===== DATATABLES OF INK CONSUMPTION END ================

            //===== DATATABLES OF PAPER TS CONSUMPTION ================
             var dataTablePaperConsumptionsTS = $("#tblViewPaperConsumptionTS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER TS CONSUMPTION END ================


            //===== DATATABLES OF PAPER CN CONSUMPTION ================
            var dataTablePaperConsumptionsCN = $("#tblViewPaperConsumptionCN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER CN CONSUMPTION END ================


             //===== DATATABLES OF PAPER YF CONSUMPTION ================
             var dataTablePaperConsumptionsYF = $("#tblViewPaperConsumptionYF").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER YF CONSUMPTION END ================


            //===== DATATABLES OF PAPER PPS CONSUMPTION ================
            var dataTablePaperConsumptionsPPS = $("#tblViewPaperConsumptionPPS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF PAPER PPS CONSUMPTION END ================

            //===== DATATABLES OF INK BOD CONSUMPTION ================
            GetCurrentFYInkDataBOD();

            $('#selFiscalYearInkBOD').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataBOD();
                    
                dataTableInkConsumptionsBOD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK BOD CONSUMPTION ================
            var dataTableInkConsumptionsBOD = $("#tblViewInkConsumptionBOD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK BOD CONSUMPTION END ================

            //===== DATATABLES OF INK IAS CONSUMPTION ================
            GetCurrentFYInkDataIAS();

            $('#selFiscalYearInkIAS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataIAS();
                    
                dataTableInkConsumptionsIAS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK IAS CONSUMPTION ================
            var dataTableInkConsumptionsIAS = $("#tblViewInkConsumptionIAS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK IAS CONSUMPTION END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            GetCurrentFYInkDataFIN();

            $('#selFiscalYearInkFIN').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataFIN();
                    
                dataTableInkConsumptionsFIN.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            var dataTableInkConsumptionsFIN = $("#tblViewInkConsumptionFIN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FIN CONSUMPTION END ================

            //===== DATATABLES OF INK HRD CONSUMPTION ================
            GetCurrentFYInkDataHRD();

            $('#selFiscalYearInkHRD').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataHRD();
                    
                dataTableInkConsumptionsHRD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK HRD CONSUMPTION ================
            var dataTableInkConsumptionsHRD = $("#tblViewInkConsumptionHRD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK HRD CONSUMPTION END ================

            //===== DATATABLES OF INK ESS CONSUMPTION ================
            GetCurrentFYInkDataESS();

            $('#selFiscalYearInkESS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataESS();
                    
                dataTableInkConsumptionsESS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK ESS CONSUMPTION ================
            var dataTableInkConsumptionsESS = $("#tblViewInkConsumptionESS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK ESS CONSUMPTION END ================

            //===== DATATABLES OF INK LOG CONSUMPTION ================
            GetCurrentFYInkDataLOG();

            $('#selFiscalYearInkLOG').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataLOG();
                    
                dataTableInkConsumptionsLOG.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK LOG CONSUMPTION ================
            var dataTableInkConsumptionsLOG = $("#tblViewInkConsumptionLOG").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK LOG CONSUMPTION END ================

            //===== DATATABLES OF INK FAC CONSUMPTION ================
            GetCurrentFYInkDataFAC();

            $('#selFiscalYearInkFAC').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataFAC();
                    
                dataTableInkConsumptionsFAC.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FAC CONSUMPTION ================
            var dataTableInkConsumptionsFaC = $("#tblViewInkConsumptionFAC").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FAC CONSUMPTION END ================

            //===== DATATABLES OF INK ISS CONSUMPTION ================
            GetCurrentFYInkDataISS();

            $('#selFiscalYearInkISS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataISS();
                    
                dataTableInkConsumptionsISS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK ISS CONSUMPTION ================
            var dataTableInkConsumptionsISS = $("#tblViewInkConsumptionISS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK ISS CONSUMPTION END ================

            //===== DATATABLES OF INK QAD CONSUMPTION ================
            GetCurrentFYInkDataQAD();

            $('#selFiscalYearInkQAD').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataQAD();
                    
                dataTableInkConsumptionsQAD.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK QAD CONSUMPTION ================
            var dataTableInkConsumptionsQAD = $("#tblViewInkConsumptionQAD").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK QAD CONSUMPTION END ================

            //===== DATATABLES OF INK EMS CONSUMPTION ================
            GetCurrentFYInkDataEMS();

            $('#selFiscalYearInkEMS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataEMS();
                    
                dataTableInkConsumptionsEMS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK EMS CONSUMPTION ================
            var dataTableInkConsumptionsEMS = $("#tblViewInkConsumptionEMS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK EMS CONSUMPTION END ================

            //===== DATATABLES OF INK TS CONSUMPTION ================
            GetCurrentFYInkDataTS();

            $('#selFiscalYearInkTS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataTS();
                    
                dataTableInkConsumptionsTS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK TS CONSUMPTION ================
            var dataTableInkConsumptionsTS = $("#tblViewInkConsumptionTS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK TS CONSUMPTION END ================

            //===== DATATABLES OF INK CN CONSUMPTION ================
            GetCurrentFYInkDataCN();

            $('#selFiscalYearInkCN').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataCN();
                    
                dataTableInkConsumptionsCN.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK CN CONSUMPTION ================
            var dataTableInkConsumptionsCN = $("#tblViewInkConsumptionCN").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK CN CONSUMPTION END ================

            //===== DATATABLES OF INK YF CONSUMPTION ================
            GetCurrentFYInkDataYF();

            $('#selFiscalYearInkYF').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataYF();
                    
                dataTableInkConsumptionsYF.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK YF CONSUMPTION ================
            var dataTableInkConsumptionsYF = $("#tblViewInkConsumptionYF").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK YF CONSUMPTION END ================

            //===== DATATABLES OF INK PPS CONSUMPTION ================
            GetCurrentFYInkDataPPS();

            $('#selFiscalYearInkPPS').on('change', function() {
                $('.selectYearInk').val($(this).find(":selected").val());
                $('.selectYearInk').val();

                GetCurrentFYInkDataPPS();
                    
                dataTableInkConsumptionsPPS.draw();
            });
            //===== DATATABLES END ================

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            var dataTableInkConsumptionsPPS = $("#tblViewInkConsumptionPPS").DataTable({
                "processing": false,
                "paging": false,
                "searching": false,
                "responsive": true,
                "order": [0, 'desc'],
                "bSort": false,
                "bInfo" : false,
            });
            //===== DATATABLES OF INK FIN CONSUMPTION END ================

            //====== ADD ACTION PLAN ======

        $("#formAddActionPlan").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddActionPlan")).prop('disabled', false);
                AddActionPlan();
            });

        function AddActionPlan() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_action_plan",
                    method: "post",
                    data: $('#formAddActionPlan').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddActionPlan").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddActionPlan").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');
                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }

                            if (response['error']['action'] === undefined) {
                                $("#txtAddAction").removeClass('is-invalid');
                                $("#txtAddAction").attr('title', '');
                            } else {
                                $("#txtAddAction").addClass('is-invalid');
                                $("#txtAddAction").attr('title', response['error']['action']);
                            }

                            if (response['error']['person'] === undefined) {
                                $("#txtAddPerson").removeClass('is-invalid');
                                $("#txtAddPerson").attr('title', '');
                            } else {
                                $("#txtAddPerson").addClass('is-invalid');
                                $("#txtAddPerson").attr('title', response['error']['person']);
                            }

                            if (response['error']['remarks'] === undefined) {
                                $("#txtAddRemarks").removeClass('is-invalid');
                                $("#txtAddRemarks").attr('title', '');
                            } else {
                                $("#txtAddRemarks").addClass('is-invalid');
                                $("#txtAddRemarks").attr('title', response['error']['remarks']);
                            }
                            
                        }  else if (response['result'] == 0) {
                            toastr.warning( 'You already have a record for this month!');
                        }else if (response['result'] == 1) {
                            $("#modalActionPlan").modal('hide');
                            dataTableActionPlan.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month!');
                        }else if (response['result'] == 3) {
                            toastr.warning( 'You have no Record for this month, please put target first!');
                        }

                        $("#iBtnAddActionPlan").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddActionPlan").removeAttr('disabled');
                        $("#iBtnAddActionPlan").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddActionPlan").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddActionPlan").removeAttr('disabled');
                        $("#iBtnAddActionPlan").addClass('fa fa-check');
                    }
                });
            }

            //===== ADD ACTION PLAN END ================

            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTableActionPlan = $("#tblActionPlan").DataTable({
                "processing": false,
                "serverSide": true,
                // "responsive": true,
                // "scrollY": true,
                "ajax": {
                    url: "view_action_plan",
                },
                "columns": [{
                        "data": "action",
                        orderable: true,
                        width: "10%"
                    },
                    {
                        "data": "fiscal_year_id.fiscal_year",
                        width: "10%",
                        visible: false
                    },
                    {   
                        "data": "person",
                        orderable: true,
                        width: "10%"
                        // orderable: false
                    },
                    {
                        "data": "month",
                        orderable: true,
                        width: "10%"
                    },
                    {
                        "data": "remarks",
                        orderable: false
                    },
                    {
                        "data": "action_btn",
                        orderable: false
                    },
                ],
                "order": [
                    [1, 'desc'],
                    [0, 'asc']
                ]
                // "bSort": false,
            });
            //===== DATATABLES OF ENERGY CONSUMPTION END ================
        });

        
    </script>
@endsection
