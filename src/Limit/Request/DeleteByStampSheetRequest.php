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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteByStampSheet: Execute Counter deletion as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitdeletecounterbyuserid
 */
class DeleteByStampSheetRequest extends Gs2BasicRequest {
    /** @var string Transaction */
    private $stampSheet;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @return string|null Transaction */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}
    /** @param string|null $stampSheet Transaction */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}
    /**
     * @param string|null $stampSheet Transaction
     * @return DeleteByStampSheetRequest
     */
	public function withStampSheet(?string $stampSheet): DeleteByStampSheetRequest {
		$this->stampSheet = $stampSheet;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return DeleteByStampSheetRequest
     */
	public function withKeyId(?string $keyId): DeleteByStampSheetRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteByStampSheetRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteByStampSheetRequest())
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "stampSheet" => $this->getStampSheet(),
            "keyId" => $this->getKeyId(),
        );
    }
}