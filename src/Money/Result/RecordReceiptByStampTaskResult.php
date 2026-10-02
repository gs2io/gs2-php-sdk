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

namespace Gs2\Money\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money\Model\Receipt;

/**
 * Result of recordReceiptByStampTask: Execute receipt recording as a consume action
 *
 * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneyrecordreceipt
 */
class RecordReceiptByStampTaskResult implements IResult {
    /** @var Receipt Recorded Receipt */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Receipt|null Recorded Receipt */
	public function getItem(): ?Receipt {
		return $this->item;
	}

    /** @param Receipt|null $item Recorded Receipt */
	public function setItem(?Receipt $item) {
		$this->item = $item;
	}

    /**
     * @param Receipt|null $item Recorded Receipt
     * @return RecordReceiptByStampTaskResult
     */
	public function withItem(?Receipt $item): RecordReceiptByStampTaskResult {
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
     * @return RecordReceiptByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): RecordReceiptByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?RecordReceiptByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new RecordReceiptByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Receipt::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}