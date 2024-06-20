from rest_framework import serializers
from .models import JobWorker, JobCategory

class JobCategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = JobCategory
        fields = ['id', 'name']

class JobWorkerSerializer(serializers.ModelSerializer):
    job_category = JobCategorySerializer(many=True)
    
    class Meta:
        model = JobWorker
        fields = ['id', 'first_name', 'last_name', 'description', 'price', 'job_category']