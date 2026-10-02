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
 * Result of setGradeByUserId: Set cumulative grade gained
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#setgradebyuserid
 */
class SetGradeByUserIdResult implements IResult {
    /** @var Status Status updated */
    private $item;
    /** @var Status Status before update */
    private $old;
    /** @var string GS2-Experience Namespace Name */
    private $experienceNamespaceName;
    /** @var ExperienceStatus GS2-Experience Status after addition */
    private $experienceStatus;

    /** @return Status|null Status updated */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Status updated */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Status updated
     * @return SetGradeByUserIdResult
     */
	public function withItem(?Status $item): SetGradeByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return Status|null Status before update */
	public function getOld(): ?Status {
		return $this->old;
	}

    /** @param Status|null $old Status before update */
	public function setOld(?Status $old) {
		$this->old = $old;
	}

    /**
     * @param Status|null $old Status before update
     * @return SetGradeByUserIdResult
     */
	public function withOld(?Status $old): SetGradeByUserIdResult {
		$this->old = $old;
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
     * @return SetGradeByUserIdResult
     */
	public function withExperienceNamespaceName(?string $experienceNamespaceName): SetGradeByUserIdResult {
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
     * @return SetGradeByUserIdResult
     */
	public function withExperienceStatus(?ExperienceStatus $experienceStatus): SetGradeByUserIdResult {
		$this->experienceStatus = $experienceStatus;
		return $this;
	}

    public static function fromJson(?array $data): ?SetGradeByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SetGradeByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Status::fromJson($data['old']) : null)
            ->withExperienceNamespaceName(array_key_exists('experienceNamespaceName', $data) && $data['experienceNamespaceName'] !== null ? $data['experienceNamespaceName'] : null)
            ->withExperienceStatus(array_key_exists('experienceStatus', $data) && $data['experienceStatus'] !== null ? ExperienceStatus::fromJson($data['experienceStatus']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
            "experienceNamespaceName" => $this->getExperienceNamespaceName(),
            "experienceStatus" => $this->getExperienceStatus() !== null ? $this->getExperienceStatus()->toJson() : null,
        );
    }
}