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

namespace Gs2\SeasonRating\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SeasonRating\Model\TierModel;

/**
 * Request for createSeasonModelMaster: Create Season Model Master
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#createseasonmodelmaster
 */
class CreateSeasonModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Tier Models */
    private $tiers;
    /** @var string Experience Model ID */
    private $experienceModelId;
    /** @var string Challenge Period Event ID */
    private $challengePeriodEventId;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return CreateSeasonModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateSeasonModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Season Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Season Model name
     * @return CreateSeasonModelMasterRequest
     */
	public function withName(?string $name): CreateSeasonModelMasterRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateSeasonModelMasterRequest
     */
	public function withDescription(?string $description): CreateSeasonModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return CreateSeasonModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateSeasonModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Tier Models */
	public function getTiers(): ?array {
		return $this->tiers;
	}
    /** @param array|null $tiers List of Tier Models */
	public function setTiers(?array $tiers) {
		$this->tiers = $tiers;
	}
    /**
     * @param array|null $tiers List of Tier Models
     * @return CreateSeasonModelMasterRequest
     */
	public function withTiers(?array $tiers): CreateSeasonModelMasterRequest {
		$this->tiers = $tiers;
		return $this;
	}
    /** @return string|null Experience Model ID */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model ID */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model ID
     * @return CreateSeasonModelMasterRequest
     */
	public function withExperienceModelId(?string $experienceModelId): CreateSeasonModelMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return string|null Challenge Period Event ID */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId Challenge Period Event ID */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId Challenge Period Event ID
     * @return CreateSeasonModelMasterRequest
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): CreateSeasonModelMasterRequest {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateSeasonModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateSeasonModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTiers(!array_key_exists('tiers', $data) || $data['tiers'] === null ? null : array_map(
                function ($item) {
                    return TierModel::fromJson($item);
                },
                $data['tiers']
            ))
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "tiers" => $this->getTiers() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTiers()
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}