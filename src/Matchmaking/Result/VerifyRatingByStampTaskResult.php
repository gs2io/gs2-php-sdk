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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Rating;

/**
 * Result of verifyRatingByStampTask: Verify Rating as a verify action
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/stamp_sheet/#gs2matchmakingverifyratingbyuserid
 */
class VerifyRatingByStampTaskResult implements IResult {
    /** @var Rating Rating */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return Rating|null Rating */
	public function getItem(): ?Rating {
		return $this->item;
	}

    /** @param Rating|null $item Rating */
	public function setItem(?Rating $item) {
		$this->item = $item;
	}

    /**
     * @param Rating|null $item Rating
     * @return VerifyRatingByStampTaskResult
     */
	public function withItem(?Rating $item): VerifyRatingByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of verification actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of verification actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of verification actions
     * @return VerifyRatingByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyRatingByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRatingByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyRatingByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Rating::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}