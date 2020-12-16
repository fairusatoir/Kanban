<?php
    $footer = "kanban_board_footer.php";
?>

<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Sub Assembly Store</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Sub Assembly Aileron</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Sub Assembly Elevator</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Sub Assembly Rudder</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                <div class="task-board">
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">To Do</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-all-todo" data-status="waiting">
                            <!-- Card -->
                            
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Doing</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-all-doing" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>

                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Done</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-all-done" data-status="finish">
                            <!-- Card -->
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
            <div class="task-board">
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">To Do</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-aileron-todo" data-level="0" data-status="waiting">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 7</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-aileron-doing-7" data-level="7" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 6</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-aileron-doing-6" data-level="6" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 5</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-aileron-doing-5" data-level="5" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>

                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 4 (Done)</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-aileron-done" data-level="4" data-status="finish">
                            <!-- Card -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
            <div class="task-board">
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">To Do</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-elevator-todo" data-status="waiting">
                            <!-- Card -->
                            <li class="text-row ui-sortable-handle" data-task-id="1">Task 1</li>
                            <li class="text-row ui-sortable-handle" data-task-id="2">Task 2</li>
                        </ul>
                    </div>
                     <!-- Board -->
                     <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 7</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-elevator-doing-7" data-level="7" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 6</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-elevator-doing-6" data-level="6" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 5</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-elevator-doing-5" data-level="5" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>

                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 4 (Done)</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-elevator-done" data-status="finish">
                            <!-- Card -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
            <div class="task-board">
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">To Do</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-rudder-todo" data-status="waiting">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 6</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-rudder-doing-6" data-level="6" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>
                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 5</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-rudder-doing-5" data-level="5" data-status="on-progress">
                            <!-- Card -->
                        </ul>
                    </div>

                    <!-- Board -->
                    <div class="status-card">
                        <!-- Board title -->
                        <div class="card-header">
                            <span class="card-header-text">Level 4 (Done)</span>
                        </div>
                        <ul class="sortable ui-sortable" id="sort-rudder-done" data-status="finish">
                            <!-- Card -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



