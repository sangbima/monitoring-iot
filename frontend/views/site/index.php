<?php

/** @var yii\web\View $this */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <!-- Row start -->
    <div class="row gx-3">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-bar-chart fs-1 text-primary lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="m-0 text-secondary fw-normal">Sales</h5>
                        <h3 class="m-0 text-primary">3500</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-bag-check fs-1 text-primary lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="m-0 text-secondary fw-normal">Orders</h5>
                        <h3 class="m-0 text-primary">2900</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="arrow-label">+18%</div>
                    <div class="mb-2">
                        <i class="bi bi-box-seam fs-1 text-primary lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="m-0 text-secondary fw-normal">Items</h5>
                        <h3 class="m-0 text-primary">6500</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="arrow-label">+24%</div>
                    <div class="mb-2">
                        <i class="bi bi-bell fs-1 text-primary lh-1"></i>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="m-0 text-secondary fw-normal">Signups</h5>
                        <h3 class="m-0 text-primary">7200</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

    <!-- Row start -->
    <div class="row gx-3">
        <div class="col-xxl-12">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Overview</h5>
                    <button class="btn btn-outline-primary btn-sm ms-auto">
                        Download
                    </button>
                </div>
                <div class="card-body">
                    <!-- Row start -->
                    <div class="row gx-3">
                        <div class="col-lg-5 col-sm-12 col-12">
                            <h6 class="text-center mb-3">Visitors</h6>
                            <div id="visitors"></div>
                            <div class="my-3 text-center">
                                <div class="badge bg-danger bg-opacity-10 text-danger">
                                    10% higher than last month
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12 col-12">
                            <div class="border px-2 py-4 rounded-5 h-100 text-center">
                                <h6 class="mt-3 mb-5">Monthly Average</h6>
                                <div class="mb-5">
                                    <h2 class="text-primary">9600</h2>
                                    <h6 class="text-secondary fw-light">Visitors</h6>
                                </div>
                                <div class="mb-4">
                                    <h2 class="text-danger">$450<sup>k</sup></h2>
                                    <h6 class="text-secondary fw-light">Sales</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-12 col-12">
                            <h6 class="text-center mb-3">Sales</h6>
                            <div id="sales"></div>
                            <div class="my-3 text-center">
                                <div class="badge bg-primary bg-opacity-10 text-primary">
                                    12% higher than last month
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row ends -->
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->

    <!-- Row start -->
    <div class="row gx-3">
        <div class="col-xl-8 col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Team Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="m-0 p-0">
                        <li class="team-activity d-flex flex-wrap">
                            <div class="activity-time py-2 me-3">
                                <p class="m-0">10:30AM</p>
                                <span class="badge bg-primary">New</span>
                            </div>
                            <div class="d-flex flex-column py-2">
                                <h6>Earth - Admin Dashboard</h6>
                                <p class="m-0 text-secondary">by Elnathan Lois</p>
                            </div>
                            <div class="ms-auto mt-4">
                                <div class="progress small mb-1">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-secondary">(225 of 700gb)</p>
                            </div>
                        </li>
                        <li class="team-activity d-flex flex-wrap">
                            <div class="activity-time py-2 me-3">
                                <p class="m-0">11:30AM</p>
                                <span class="badge bg-primary">Task</span>
                            </div>
                            <div class="d-flex flex-column py-2">
                                <h6>Bootstrap Gallery Admin Templates</h6>
                                <p class="m-0 text-secondary">by Patrobus Nicole</p>
                            </div>
                            <div class="ms-auto mt-4">
                                <div class="progress small mb-1">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-secondary">90% completed</p>
                            </div>
                        </li>
                        <li class="team-activity d-flex flex-wrap">
                            <div class="activity-time py-2 me-3">
                                <p class="m-0">12:50PM</p>
                                <span class="badge bg-danger">Closed</span>
                            </div>
                            <div class="d-flex flex-column py-2">
                                <h6>Bootstrap Admin Themes</h6>
                                <p class="m-0 text-secondary">by Abilene Omega</p>
                            </div>
                            <div class="ms-auto mt-3">
                                <div id="sparkline1"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Tasks</h5>
                </div>
                <div class="card-body">
                    <div class="auto-align-graph">
                        <div id="tasks"></div>
                    </div>
                    <div class="grid text-center">
                        <div class="g-col-4">
                            <i class="bi bi-triangle text-warning"></i>
                            <h3 class="m-0 mt-1">7</h3>
                            <p class="text-secondary m-0">Ongoing</p>
                        </div>
                        <div class="g-col-4">
                            <i class="bi bi-triangle text-primary"></i>
                            <h3 class="m-0 mt-1 fw-bolder">9</h3>
                            <p class="text-secondary m-0">Pending</p>
                        </div>
                        <div class="g-col-4">
                            <i class="bi bi-triangle text-danger"></i>
                            <h3 class="m-0 mt-1">12</h3>
                            <p class="text-secondary m-0">Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

    <!-- Row start -->
    <div class="row gx-3">
        <div class="col-xl-4 col-sm-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Events</h5>
                </div>
                <div class="card-body">
                    <div class="bg-light px-3 py-2 d-flex justify-content-between align-items-center">
                        <div id="todays-date" class="fw-semibold"></div>
                        <div class="badge rounded-pill bg-primary fs-6">
                            <span>21</span> Events
                        </div>
                    </div>
                    <div class="event-list mt-3">
                        <div class="d-flex align-items-center mb-4">
                            <img src="/frontend/images/checked.svg" alt="Bootstrap Gallery" class="img-2x" />
                            <div class="ms-3">
                                <h6 class="text-primary mb-1 fw-bold">11:30AM</h6>
                                <h6 class="m-0 text-secondary fw-normal">
                                    Product Launch
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <img src="/frontend/images/checked.svg" alt="Bootstrap Gallery" class="img-2x" />
                            <div class="ms-3">
                                <h6 class="text-primary mb-1 fw-bold">2:30PM</h6>
                                <h6 class="m-0 text-secondary fw-normal">
                                    Code review
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="/frontend/images/not-checked.svg" alt="Bootstrap Gallery" class="img-2x" />
                            <div class="ms-3">
                                <h6 class="text-primary mb-1 fw-bold">03:30PM</h6>
                                <h6 class="m-0 text-secondary fw-normal">
                                    Product meeting with dev team
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Income</h5>
                </div>
                <div class="card-body p-0">
                    <div id="income"></div>
                    <div class="p-3 mt-n3">
                        <div class="d-flex gap-3">
                            <div class="">
                                <h4 class="fw-semibold mb-1">1600k</h4>
                                <p class="text-secondary m-0">
                                    <span class="bi bi-record-fill text-primary me-1"></span>Overall
                                    Income
                                </p>
                            </div>

                            <div class="">
                                <h4 class="fw-semibold mb-1">1200k</h4>
                                <p class="text-secondary m-0">
                                    <span class="bi bi-record-fill text-danger me-1"></span>Overall
                                    Expenses
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Activity</h5>
                </div>
                <div class="card-body">
                    <div class="my-2 d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">Server down</h6>
                            <div class="badge bg-danger">High</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">Notification from bank</h6>
                            <div class="badge bg-primary">Low</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">Transaction success alert</h6>
                            <div class="badge bg-primary">Low</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">Critical issue</h6>
                            <div class="badge bg-danger">High</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">Bug fix</h6>
                            <div class="badge bg-danger">High</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-0 fw-normal">OS update</h6>
                            <div class="badge bg-primary">Low</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>