document.addEventListener("DOMContentLoaded", () => {
        const applyNowBtn = document.getElementById("applyNowBtn");
        console.log('DOM fully loaded and parsed');


        async function checkResumeLimit() {
            const userId = applyNowBtn.dataset.userId;
            const response = await fetch('/resume/count', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({user_id: userId}),
            });
            const result = await response.json();

            console.log(result);
            console.log(applyNowBtn);

            if (result.resumeCount >= 3) {
                applyNowBtn.style.opacity = 0.5;
                applyNowBtn.style.pointerEvents = "none";
                console.log("Button is disabled");
            } else {
                applyNowBtn.style.opacity = 1;
                applyNowBtn.style.pointerEvents = "auto";
                console.log("Button is enabled");
            }
        }

        checkResumeLimit();

    }
)
;
