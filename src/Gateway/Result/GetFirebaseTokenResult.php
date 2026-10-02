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

namespace Gs2\Gateway\Result;

use Gs2\Core\Model\IResult;
use Gs2\Gateway\Model\FirebaseToken;

/**
 * Result of getFirebaseToken: Get Firebase device token
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#getfirebasetoken
 */
class GetFirebaseTokenResult implements IResult {
    /** @var FirebaseToken Firebase Device Token */
    private $item;

    /** @return FirebaseToken|null Firebase Device Token */
	public function getItem(): ?FirebaseToken {
		return $this->item;
	}

    /** @param FirebaseToken|null $item Firebase Device Token */
	public function setItem(?FirebaseToken $item) {
		$this->item = $item;
	}

    /**
     * @param FirebaseToken|null $item Firebase Device Token
     * @return GetFirebaseTokenResult
     */
	public function withItem(?FirebaseToken $item): GetFirebaseTokenResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFirebaseTokenResult {
        if ($data === null) {
            return null;
        }
        return (new GetFirebaseTokenResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? FirebaseToken::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}