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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteAcceptVersionByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $versionName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteAcceptVersionByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeleteAcceptVersionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getVersionName(): ?string {
		return $this->versionName;
	}

	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	public function withVersionName(?string $versionName): DeleteAcceptVersionByUserIdRequest {
		$this->versionName = $versionName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteAcceptVersionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteAcceptVersionByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withVersionName(empty($data['versionName']) ? null : $data['versionName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "versionName" => $this->getVersionName(),
        );
    }
}