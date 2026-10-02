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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\Complete;

/**
 * Result of batchReceiveByStampTask: Batch receive mission rewards as a consume action within a distributed transaction
 *
 * @see https://docs.gs2.io/api_reference/mission/stamp_sheet/#gs2missionbatchreceivebyuserid
 */
class BatchReceiveByStampTaskResult implements IResult {
    /** @var Complete Completion Status */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Complete|null Completion Status */
	public function getItem(): ?Complete {
		return $this->item;
	}

    /** @param Complete|null $item Completion Status */
	public function setItem(?Complete $item) {
		$this->item = $item;
	}

    /**
     * @param Complete|null $item Completion Status
     * @return BatchReceiveByStampTaskResult
     */
	public function withItem(?Complete $item): BatchReceiveByStampTaskResult {
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
     * @return BatchReceiveByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): BatchReceiveByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchReceiveByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new BatchReceiveByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Complete::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}