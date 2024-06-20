from django.shortcuts import render
from rest_framework import generics

from .models import JobWorker
from .serializers import JobWorkerSerializer

# Worker Listing View
class JobWorkerListingView(generics.ListCreateAPIView):
    queryset = JobWorker.objects.all()
    serializer_class = JobWorkerSerializer

class JobWorkerInstanceView(generics.RetrieveUpdateDestroyAPIView):
    queryset = JobWorker.objects.all()
    serializer_class = JobWorkerSerializer