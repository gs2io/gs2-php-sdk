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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\Stamina;

/**
 * Result of verifyStaminaValueByStampTask: Verify the current value of stamina as a verification action
 *
 * @see https://docs.gs2.io/api_reference/stamina/stamp_sheet/#gs2staminaverifystaminavaluebyuserid
 */
class VerifyStaminaValueByStampTaskResult implements IResult {
    /** @var Stamina Stamina */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return Stamina|null Stamina */
	public function getItem(): ?Stamina {
		return $this->item;
	}

    /** @param Stamina|null $item Stamina */
	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

    /**
     * @param Stamina|null $item Stamina
     * @return VerifyStaminaValueByStampTaskResult
     */
	public function withItem(?Stamina $item): VerifyStaminaValueByStampTaskResult {
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
     * @return VerifyStaminaValueByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyStaminaValueByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyStaminaValueByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyStaminaValueByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stamina::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}