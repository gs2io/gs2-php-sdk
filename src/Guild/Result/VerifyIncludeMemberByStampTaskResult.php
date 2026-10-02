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

namespace Gs2\Guild\Result;

use Gs2\Core\Model\IResult;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;

/**
 * Result of verifyIncludeMemberByStampTask: Execute verification of whether the guild members include the user ID as a verify action
 *
 * @see https://docs.gs2.io/api_reference/guild/stamp_sheet/#gs2guildverifyincludememberbyuserid
 */
class VerifyIncludeMemberByStampTaskResult implements IResult {
    /** @var Guild Guild updated */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return Guild|null Guild updated */
	public function getItem(): ?Guild {
		return $this->item;
	}

    /** @param Guild|null $item Guild updated */
	public function setItem(?Guild $item) {
		$this->item = $item;
	}

    /**
     * @param Guild|null $item Guild updated
     * @return VerifyIncludeMemberByStampTaskResult
     */
	public function withItem(?Guild $item): VerifyIncludeMemberByStampTaskResult {
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
     * @return VerifyIncludeMemberByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyIncludeMemberByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyIncludeMemberByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyIncludeMemberByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Guild::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}