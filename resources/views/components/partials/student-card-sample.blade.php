<!-- Sample Student Card (Used when no database images) -->
<div class="carousel-item" style="width: 33.333%; padding: 0 20px;">
    <div class="student-card text-center" 
         style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); 
                border-radius: 25px; 
                padding: 2.5rem; 
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1); 
                border: 3px solid transparent; 
                position: relative; 
                overflow: hidden;
                min-height: 400px;">
        
        <!-- Sample Avatar -->
        <div class="student-image-container mb-4" style="position: relative;">
            <div class="student-avatar mx-auto d-flex align-items-center justify-content-center" 
                 style="width: 150px; 
                        height: 150px; 
                        background: linear-gradient(135deg, #FFCA4C, #FFD700); 
                        border-radius: 50%; 
                        box-shadow: 0 20px 50px rgba(255, 202, 76, 0.4); 
                        border: 6px solid #FFD700;">
                <i class="fas fa-user-graduate" style="font-size: 60px; color: white;"></i>
            </div>
            
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
        
        <!-- Sample Student Info -->
        <div class="student-info">
            @php
                $sampleStudents = [
                    ['name' => 'Alex Johnson', 'quote' => 'Building robots taught me that I can create anything I imagine!'],
                    ['name' => 'Emma Chen', 'quote' => 'Coding with Arduino opened up a whole new world of possibilities for me.'],
                    ['name' => 'Marcus Rodriguez', 'quote' => 'YoungBotMinds helped me turn my curiosity into real technical skills.']
                ];
                $student = $sampleStudents[$index] ?? $sampleStudents[0];
            @endphp
            
            <h5 class="fw-bold mb-3" style="color: #333; font-size: 1.3rem;">
                {{ $student['name'] }}
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
                "{{ $student['quote'] }}"
            </p>
        </div>
    </div>
</div>