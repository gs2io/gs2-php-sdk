<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateExperienceModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $experienceName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $defaultExperience;
    /** @var int */
    private $defaultRankCap;
    /** @var int */
    private $maxRankCap;
    /** @var string */
    private $rankThresholdName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateExperienceModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getExperienceName(): ?string {
		return $this->experienceName;
	}

	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}

	public function withExperienceName(?string $experienceName): UpdateExperienceModelMasterRequest {
		$this->experienceName = $experienceName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateExperienceModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateExperienceModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDefaultExperience(): ?int {
		return $this->defaultExperience;
	}

	public function setDefaultExperience(?int $defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	public function withDefaultExperience(?int $defaultExperience): UpdateExperienceModelMasterRequest {
		$this->defaultExperience = $defaultExperience;
		return $this;
	}

	public function getDefaultRankCap(): ?int {
		return $this->defaultRankCap;
	}

	public function setDefaultRankCap(?int $defaultRankCap) {
		$this->defaultRankCap = $defaultRankCap;
	}

	public function withDefaultRankCap(?int $defaultRankCap): UpdateExperienceModelMasterRequest {
		$this->defaultRankCap = $defaultRankCap;
		return $this;
	}

	public function getMaxRankCap(): ?int {
		return $this->maxRankCap;
	}

	public function setMaxRankCap(?int $maxRankCap) {
		$this->maxRankCap = $maxRankCap;
	}

	public function withMaxRankCap(?int $maxRankCap): UpdateExperienceModelMasterRequest {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}

	public function getRankThresholdName(): ?string {
		return $this->rankThresholdName;
	}

	public function setRankThresholdName(?string $rankThresholdName) {
		$this->rankThresholdName = $rankThresholdName;
	}

	public function withRankThresholdName(?string $rankThresholdName): UpdateExperienceModelMasterRequest {
		$this->rankThresholdName = $rankThresholdName;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateExperienceModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateExperienceModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withExperienceName(empty($data['experienceName']) ? null : $data['experienceName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDefaultExperience(empty($data['defaultExperience']) ? null : $data['defaultExperience'])
            ->withDefaultRankCap(empty($data['defaultRankCap']) ? null : $data['defaultRankCap'])
            ->withMaxRankCap(empty($data['maxRankCap']) ? null : $data['maxRankCap'])
            ->withRankThresholdName(empty($data['rankThresholdName']) ? null : $data['rankThresholdName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "experienceName" => $this->getExperienceName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "defaultExperience" => $this->getDefaultExperience(),
            "defaultRankCap" => $this->getDefaultRankCap(),
            "maxRankCap" => $this->getMaxRankCap(),
            "rankThresholdName" => $this->getRankThresholdName(),
        );
    }
}