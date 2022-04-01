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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\Identifier;

class CreateIdentifierResult implements IResult {
    /** @var Identifier */
    private $item;
    /** @var string */
    private $clientSecret;

	public function getItem(): ?Identifier {
		return $this->item;
	}

	public function setItem(?Identifier $item) {
		$this->item = $item;
	}

	public function withItem(?Identifier $item): CreateIdentifierResult {
		$this->item = $item;
		return $this;
	}

	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}

	public function withClientSecret(?string $clientSecret): CreateIdentifierResult {
		$this->clientSecret = $clientSecret;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateIdentifierResult {
        if ($data === null) {
            return null;
        }
        return (new CreateIdentifierResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Identifier::fromJson($data['item']) : null)
            ->withClientSecret(array_key_exists('clientSecret', $data) && $data['clientSecret'] !== null ? $data['clientSecret'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "clientSecret" => $this->getClientSecret(),
        );
    }
}