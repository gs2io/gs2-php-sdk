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

namespace Gs2\Grade\Result;

use Gs2\Core\Model\IResult;
use Gs2\Grade\Model\Status;
use Gs2\Experience\Model\Status as ExperienceStatus;

/**
 * Result of subGradeByUserId: Subtract grade by User ID
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#subgradebyuserid
 */
class SubGradeByUserIdResult implements IResult {
    /** @var Status Status after subtraction */
    private $item;
    /** @var string GS2-Experience Namespace Name */
    private $experienceNamespaceName;
    /** @var ExperienceStatus GS2-Experience Status after addition */
    private $experienceStatus;

    /** @return Status|null Status after subtraction */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Status after subtraction */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Status after subtraction
     * @return SubGradeByUserIdResult
     */
	public function withItem(?Status $item): SubGradeByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null GS2-Experience Namespace Name */
	public function getExperienceNamespaceName(): ?string {
		return $this->experienceNamespaceName;
	}

    /** @param string|null $experienceNamespaceName GS2-Experience Namespace Name */
	public function setExperienceNamespaceName(?string $experienceNamespaceName) {
		$this->experienceNamespaceName = $experienceNamespaceName;
	}

    /**
     * @param string|null $experienceNamespaceName GS2-Experience Namespace Name
     * @return SubGradeByUserIdResult
     */
	public function withExperienceNamespaceName(?string $experienceNamespaceName): SubGradeByUserIdResult {
		$this->experienceNamespaceName = $experienceNamespaceName;
		return $this;
	}

    /** @return ExperienceStatus|null GS2-Experience Status after addition */
	public function getExperienceStatus(): ?ExperienceStatus {
		return $this->experienceStatus;
	}

    /** @param ExperienceStatus|null $experienceStatus GS2-Experience Status after addition */
	public function setExperienceStatus(?ExperienceStatus $experienceStatus) {
		$this->experienceStatus = $experienceStatus;
	}

    /**
     * @param ExperienceStatus|null $experienceStatus GS2-Experience Status after addition
     * @return SubGradeByUserIdResult
     */
	public function withExperienceStatus(?ExperienceStatus $experienceStatus): SubGradeByUserIdResult {
		$this->experienceStatus = $experienceStatus;
		return $this;
	}

    public static function fromJson(?array $data): ?SubGradeByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SubGradeByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null)
            ->withExperienceNamespaceName(array_key_exists('experienceNamespaceName', $data) && $data['experienceNamespaceName'] !== null ? $data['experienceNamespaceName'] : null)
            ->withExperienceStatus(array_key_exists('experienceStatus', $data) && $data['experienceStatus'] !== null ? ExperienceStatus::fromJson($data['experienceStatus']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "experienceNamespaceName" => $this->getExperienceNamespaceName(),
            "experienceStatus" => $this->getExperienceStatus() !== null ? $this->getExperienceStatus()->toJson() : null,
        );
    }
}