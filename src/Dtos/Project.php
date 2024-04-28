<?php
namespace App\Dtos;
class Project
{
    private ProjectData $projectData;

//    public function __construct(ProjectData $projectData)
//    {
//        $this->projectData = $projectData;
//    }

    public function setProjectData(ProjectData $projectData)
    {
        $this->projectData = $projectData;
    }

    public function getProjectData(): ProjectData
    {
        return $this->projectData;
    }
}