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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetEntryWithSignatureByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $entryModelName;
    /** @var string */
    private $keyId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetEntryWithSignatureByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): GetEntryWithSignatureByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getEntryModelName(): ?string {
		return $this->entryModelName;
	}

	public function setEntryModelName(?string $entryModelName) {
		$this->entryModelName = $entryModelName;
	}

	public function withEntryModelName(?string $entryModelName): GetEntryWithSignatureByUserIdRequest {
		$this->entryModelName = $entryModelName;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): GetEntryWithSignatureByUserIdRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEntryWithSignatureByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEntryWithSignatureByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withEntryModelName(empty($data['entryModelName']) ? null : $data['entryModelName'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "entryModelName" => $this->getEntryModelName(),
            "keyId" => $this->getKeyId(),
        );
    }
}