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

namespace Gs2\Inbox\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inbox\Model\AcquireAction;
use Gs2\Inbox\Model\Message;

class ReadMessageByUserIdResult implements IResult {
    /** @var Message */
    private $item;
    /** @var string */
    private $transactionId;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;
    /** @var bool */
    private $autoRunStampSheet;

	public function getItem(): ?Message {
		return $this->item;
	}

	public function setItem(?Message $item) {
		$this->item = $item;
	}

	public function withItem(?Message $item): ReadMessageByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): ReadMessageByUserIdResult {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): ReadMessageByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): ReadMessageByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

	public function withAutoRunStampSheet(?bool $autoRunStampSheet): ReadMessageByUserIdResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

    public static function fromJson(?array $data): ?ReadMessageByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ReadMessageByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Message::fromJson($data['item']) : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withStampSheetEncryptionKeyId(array_key_exists('stampSheetEncryptionKeyId', $data) && $data['stampSheetEncryptionKeyId'] !== null ? $data['stampSheetEncryptionKeyId'] : null)
            ->withAutoRunStampSheet(array_key_exists('autoRunStampSheet', $data) ? $data['autoRunStampSheet'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "transactionId" => $this->getTransactionId(),
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
            "autoRunStampSheet" => $this->getAutoRunStampSheet(),
        );
    }
}