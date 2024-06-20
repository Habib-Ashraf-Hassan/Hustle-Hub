from django.urls import path

from .views import JobWorkerListingView, JobWorkerInstanceView

urlpatterns = [
    path('jobs/', JobWorkerListingView.as_view(), name='job_list'),
    path('jobs/<int:pk>/', JobWorkerInstanceView.as_view(), name='job_instance'),
]