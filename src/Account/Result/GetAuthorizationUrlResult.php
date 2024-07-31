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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;

class GetAuthorizationUrlResult implements IResult {
    /** @var string */
    private $authorizationUrl;

	public function getAuthorizationUrl(): ?string {
		return $this->authorizationUrl;
	}

	public function setAuthorizationUrl(?string $authorizationUrl) {
		$this->authorizationUrl = $authorizationUrl;
	}

	public function withAuthorizationUrl(?string $authorizationUrl): GetAuthorizationUrlResult {
		$this->authorizationUrl = $authorizationUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?GetAuthorizationUrlResult {
        if ($data === null) {
            return null;
        }
        return (new GetAuthorizationUrlResult())
            ->withAuthorizationUrl(array_key_exists('authorizationUrl', $data) && $data['authorizationUrl'] !== null ? $data['authorizationUrl'] : null);
    }

    public function toJson(): array {
        return array(
            "authorizationUrl" => $this->getAuthorizationUrl(),
        );
    }
}