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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetIdentifierRequest extends Gs2BasicRequest {
    /** @var string */
    private $userName;
    /** @var string */
    private $clientId;

	public function getUserName(): ?string {
		return $this->userName;
	}

	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	public function withUserName(?string $userName): GetIdentifierRequest {
		$this->userName = $userName;
		return $this;
	}

	public function getClientId(): ?string {
		return $this->clientId;
	}

	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}

	public function withClientId(?string $clientId): GetIdentifierRequest {
		$this->clientId = $clientId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetIdentifierRequest {
        if ($data === null) {
            return null;
        }
        return (new GetIdentifierRequest())
            ->withUserName(empty($data['userName']) ? null : $data['userName'])
            ->withClientId(empty($data['clientId']) ? null : $data['clientId']);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "clientId" => $this->getClientId(),
        );
    }
}