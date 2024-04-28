<?php
namespace App\Dtos;
use Symfony\Component\Serializer\Attribute\SerializedName;
class ProjectArray2
{

    #[SerializedName('projectData')]
    private array $projectsData = [];

    public function setProjectsData(array $projectsData)
    {
        $this->projectsData = $projectsData;
    }

//    public function __construct(array $projectData)
//    {
//        $this->projectData = $projectData;
//    }

    public function getProjectsData(): array
    {
        return $this->projectsData;
    }

    public function addProjectsData(ProjectData $projectData): void
    {
        $this->projectsData[] = $projectData;
    }
}