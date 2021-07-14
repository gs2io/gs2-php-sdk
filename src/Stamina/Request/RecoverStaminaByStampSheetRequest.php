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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class RecoverStaminaByStampSheetRequest extends Gs2BasicRequest {
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $keyId;

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): RecoverStaminaByStampSheetRequest {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): RecoverStaminaByStampSheetRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?RecoverStaminaByStampSheetRequest {
        if ($data === null) {
            return null;
        }
        return (new RecoverStaminaByStampSheetRequest())
            ->withStampSheet(empty($data['stampSheet']) ? null : $data['stampSheet'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId']);
    }

    public function toJson(): array {
        return array(
            "stampSheet" => $this->getStampSheet(),
            "keyId" => $this->getKeyId(),
        );
    }
}