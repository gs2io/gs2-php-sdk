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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class RejectRequestRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $fromUserId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): RejectRequestRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): RejectRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getFromUserId(): ?string {
		return $this->fromUserId;
	}

	public function setFromUserId(?string $fromUserId) {
		$this->fromUserId = $fromUserId;
	}

	public function withFromUserId(?string $fromUserId): RejectRequestRequest {
		$this->fromUserId = $fromUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?RejectRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new RejectRequestRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withFromUserId(empty($data['fromUserId']) ? null : $data['fromUserId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "fromUserId" => $this->getFromUserId(),
        );
    }
}