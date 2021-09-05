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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class SetUserIdByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var bool */
    private $allowConcurrentAccess;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SetUserIdByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SetUserIdByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getAllowConcurrentAccess(): ?bool {
		return $this->allowConcurrentAccess;
	}

	public function setAllowConcurrentAccess(?bool $allowConcurrentAccess) {
		$this->allowConcurrentAccess = $allowConcurrentAccess;
	}

	public function withAllowConcurrentAccess(?bool $allowConcurrentAccess): SetUserIdByUserIdRequest {
		$this->allowConcurrentAccess = $allowConcurrentAccess;
		return $this;
	}

    public static function fromJson(?array $data): ?SetUserIdByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetUserIdByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withAllowConcurrentAccess($data['allowConcurrentAccess']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "allowConcurrentAccess" => $this->getAllowConcurrentAccess(),
        );
    }
}