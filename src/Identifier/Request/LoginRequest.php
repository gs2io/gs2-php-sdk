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

class LoginRequest extends Gs2BasicRequest {
    /** @var string */
    private $clientId;
    /** @var string */
    private $clientSecret;

	public function getClientId(): ?string {
		return $this->clientId;
	}

	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}

	public function withClientId(?string $clientId): LoginRequest {
		$this->clientId = $clientId;
		return $this;
	}

	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}

	public function withClientSecret(?string $clientSecret): LoginRequest {
		$this->clientSecret = $clientSecret;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginRequest {
        if ($data === null) {
            return null;
        }
        return (new LoginRequest())
            ->withClientId(empty($data['clientId']) ? null : $data['clientId'])
            ->withClientSecret(empty($data['clientSecret']) ? null : $data['clientSecret']);
    }

    public function toJson(): array {
        return array(
            "clientId" => $this->getClientId(),
            "clientSecret" => $this->getClientSecret(),
        );
    }
}