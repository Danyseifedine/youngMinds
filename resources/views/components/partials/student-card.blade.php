<!-- Student Card with Database Image -->
<div class="carousel-item" style="width: {{ 100 / $totalImages }}%; padding: 0 20px;">
    <div class="student-card text-center" 
         style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); 
                border-radius: 25px; 
                padding: 2.5rem; 
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1); 
                border: 3px solid transparent; 
                position: relative; 
                overflow: hidden;
                min-height: 400px;">
        
        <!-- Student Avatar -->
        <div class="student-image-container mb-4" style="position: relative;">
            @php
                $attachment = $studentImage->attachment->first();
            @endphp
            
            @if ($attachment)
                <div class="student-avatar mx-auto" 
                     style="width: 150px; 
                            height: 150px; 
                            border-radius: 50%; 
                            overflow: hidden; 
                            box-shadow: 0 20px 50px rgba(255, 202, 76, 0.4); 
                            border: 6px solid #FFCA4C; 
                            background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                    <img src="{{ $attachment->url() }}" 
                         alt="{{ $studentImage->title ?: 'Student Image' }}"
                         loading="lazy">
                </div>
            @else
                <div class="student-avatar mx-auto d-flex align-items-center justify-content-center" 
                     style="width: 150px; 
                            height: 150px; 
                            background: linear-gradient(135deg, #FFCA4C, #FFD700); 
                            border-radius: 50%; 
                            box-shadow: 0 20px 50px rgba(255, 202, 76, 0.4); 
                            border: 6px solid #FFD700;">
                    <i class="fas fa-user-graduate" style="font-size: 60px; color: white;"></i>
                </div>
            @endif
            
            <!-- Certification Badge -->
            <div class="certification-badge position-absolute" 
                 style="top: -10px; 
                        right: 50%; 
                        transform: translateX(50%); 
                        background: linear-gradient(135deg, #28a745, #20c997); 
                        color: white; 
                        padding: 8px 15px; 
                        border-radius: 20px; 
                        font-size: 0.8rem; 
                        font-weight: bold; 
                        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);">
                <i class="fas fa-certificate me-2"></i>Certified
            </div>
        </div>
        
        <!-- Student Info -->
        <div class="student-info">
            <h5 class="fw-bold mb-3" style="color: #333; font-size: 1.3rem;">
                {{ $studentImage->title ?: 'Amazing Student' }}
            </h5>
            
            <p class="text-muted mb-3" style="font-size: 1rem;">
                Robotics & Coding Graduate
            </p>
            
            <!-- Achievement Highlight -->
            <div class="achievement-highlight mb-3 p-3" 
                 style="background: linear-gradient(135deg, #FFCA4C, #FFD700); 
                        border-radius: 15px;">
                <p class="mb-0 fw-bold text-white" style="font-size: 0.95rem;">
                    🏆 Program Completion
                </p>
            </div>
            
            <!-- Student Quote -->
            <p class="student-quote mb-0" 
               style="color: #666; 
                      font-size: 0.95rem; 
                      line-height: 1.6; 
                      font-style: italic;">
                "{{ $studentImage->description ?: 'YoungBotMinds helped me discover my passion for technology and robotics!' }}"
            </p>
        </div>
    </div>
</div>