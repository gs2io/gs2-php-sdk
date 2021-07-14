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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\ConsumeAction;
use Gs2\Exchange\Model\AcquireAction;
use Gs2\Exchange\Model\RateModel;

class ExchangeByUserIdResult implements IResult {
    /** @var RateModel */
    private $item;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;

	public function getItem(): ?RateModel {
		return $this->item;
	}

	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

	public function withItem(?RateModel $item): ExchangeByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): ExchangeByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): ExchangeByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

    public static function fromJson(?array $data): ?ExchangeByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ExchangeByUserIdResult())
            ->withItem(empty($data['item']) ? null : RateModel::fromJson($data['item']))
            ->withStampSheet(empty($data['stampSheet']) ? null : $data['stampSheet'])
            ->withStampSheetEncryptionKeyId(empty($data['stampSheetEncryptionKeyId']) ? null : $data['stampSheetEncryptionKeyId']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
        );
    }
}