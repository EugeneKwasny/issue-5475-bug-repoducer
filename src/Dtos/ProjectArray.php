<?php
namespace App\Dtos;
use Symfony\Component\Serializer\Attribute\SerializedName;
class ProjectArray
{
    #[SerializedName('projectDto')]
    private array $projectsDto = [];

    public function setProjectsDto(array $projectsData)
    {
        $this->projectsDto = $projectsData;
    }

//    public function __construct(array $projectData)
//    {
//        $this->projectData = $projectData;
//    }

    public function getProjectsDto(): array
    {
        return $this->projectsDto;
    }

    public function addProjectsDto(ProjectData $projectDto): void
    {
        $this->projectsDto[] = $projectDto;
    }
}