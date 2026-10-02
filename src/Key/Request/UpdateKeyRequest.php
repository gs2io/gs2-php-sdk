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

namespace Gs2\Key\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateKey: Update Encryption Key
 *
 * @see https://docs.gs2.io/api_reference/key/sdk/#updatekey
 */
class UpdateKeyRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Encryption Key name */
    private $keyName;
    /** @var string Description */
    private $description;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateKeyRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateKeyRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Encryption Key name */
	public function getKeyName(): ?string {
		return $this->keyName;
	}
    /** @param string|null $keyName Encryption Key name */
	public function setKeyName(?string $keyName) {
		$this->keyName = $keyName;
	}
    /**
     * @param string|null $keyName Encryption Key name
     * @return UpdateKeyRequest
     */
	public function withKeyName(?string $keyName): UpdateKeyRequest {
		$this->keyName = $keyName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateKeyRequest
     */
	public function withDescription(?string $description): UpdateKeyRequest {
		$this->description = $description;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateKeyRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateKeyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withKeyName(array_key_exists('keyName', $data) && $data['keyName'] !== null ? $data['keyName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "keyName" => $this->getKeyName(),
            "description" => $this->getDescription(),
        );
    }
}