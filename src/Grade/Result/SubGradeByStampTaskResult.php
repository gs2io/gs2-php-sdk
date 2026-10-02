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
 * Result of subGradeByStampTask: Execute grade subtraction as a consume action
 *
 * @see https://docs.gs2.io/api_reference/grade/stamp_sheet/#gs2gradesubgradebyuserid
 */
class SubGradeByStampTaskResult implements IResult {
    /** @var Status Status after subtraction */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;
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
     * @return SubGradeByStampTaskResult
     */
	public function withItem(?Status $item): SubGradeByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return SubGradeByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): SubGradeByStampTaskResult {
		$this->newContextStack = $newContextStack;
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
     * @return SubGradeByStampTaskResult
     */
	public function withExperienceNamespaceName(?string $experienceNamespaceName): SubGradeByStampTaskResult {
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
     * @return SubGradeByStampTaskResult
     */
	public function withExperienceStatus(?ExperienceStatus $experienceStatus): SubGradeByStampTaskResult {
		$this->experienceStatus = $experienceStatus;
		return $this;
	}

    public static function fromJson(?array $data): ?SubGradeByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new SubGradeByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null)
            ->withExperienceNamespaceName(array_key_exists('experienceNamespaceName', $data) && $data['experienceNamespaceName'] !== null ? $data['experienceNamespaceName'] : null)
            ->withExperienceStatus(array_key_exists('experienceStatus', $data) && $data['experienceStatus'] !== null ? ExperienceStatus::fromJson($data['experienceStatus']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
            "experienceNamespaceName" => $this->getExperienceNamespaceName(),
            "experienceStatus" => $this->getExperienceStatus() !== null ? $this->getExperienceStatus()->toJson() : null,
        );
    }
}