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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Slot;
use Gs2\Formation\Model\Form;
use Gs2\Formation\Model\Mold;

class AcquireActionToFormPropertiesByStampSheetResult implements IResult {
    /** @var Form */
    private $item;
    /** @var Mold */
    private $mold;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;

	public function getItem(): ?Form {
		return $this->item;
	}

	public function setItem(?Form $item) {
		$this->item = $item;
	}

	public function withItem(?Form $item): AcquireActionToFormPropertiesByStampSheetResult {
		$this->item = $item;
		return $this;
	}

	public function getMold(): ?Mold {
		return $this->mold;
	}

	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

	public function withMold(?Mold $mold): AcquireActionToFormPropertiesByStampSheetResult {
		$this->mold = $mold;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): AcquireActionToFormPropertiesByStampSheetResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): AcquireActionToFormPropertiesByStampSheetResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionToFormPropertiesByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionToFormPropertiesByStampSheetResult())
            ->withItem(empty($data['item']) ? null : Form::fromJson($data['item']))
            ->withMold(empty($data['mold']) ? null : Mold::fromJson($data['mold']))
            ->withStampSheet(empty($data['stampSheet']) ? null : $data['stampSheet'])
            ->withStampSheetEncryptionKeyId(empty($data['stampSheetEncryptionKeyId']) ? null : $data['stampSheetEncryptionKeyId']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "mold" => $this->getMold() !== null ? $this->getMold()->toJson() : null,
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
        );
    }
}