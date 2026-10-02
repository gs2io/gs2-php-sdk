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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of verifyEntryByStampTask: Execute the entry verification as a verify action
 *
 * @see https://docs.gs2.io/api_reference/dictionary/stamp_sheet/#gs2dictionaryverifyentrybyuserid
 */
class VerifyEntryByStampTaskResult implements IResult {
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

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
     * @return VerifyEntryByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyEntryByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEntryByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyEntryByStampTaskResult())
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}