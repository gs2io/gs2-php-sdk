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

namespace Gs2\AdReward\Result;

use Gs2\Core\Model\IResult;
use Gs2\AdReward\Model\Point;

/**
 * Result of verifyPointByStampTask: Verify Points as a verify action
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/stamp_sheet/#gs2adrewardverifypointbyuserid
 */
class VerifyPointByStampTaskResult implements IResult {
    /** @var Point Point */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return Point|null Point */
	public function getItem(): ?Point {
		return $this->item;
	}

    /** @param Point|null $item Point */
	public function setItem(?Point $item) {
		$this->item = $item;
	}

    /**
     * @param Point|null $item Point
     * @return VerifyPointByStampTaskResult
     */
	public function withItem(?Point $item): VerifyPointByStampTaskResult {
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
     * @return VerifyPointByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyPointByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyPointByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyPointByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Point::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}