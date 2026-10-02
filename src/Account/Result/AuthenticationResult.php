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
use Gs2\Account\Model\BanStatus;
use Gs2\Account\Model\Account;

/**
 * Result of authentication: Authenticate Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#authentication
 */
class AuthenticationResult implements IResult {
    /** @var Account Game Player Account */
    private $item;
    /** @var array Ban status list */
    private $banStatuses;
    /** @var string Account information used for signing */
    private $body;
    /** @var string Signature */
    private $signature;

    /** @return Account|null Game Player Account */
	public function getItem(): ?Account {
		return $this->item;
	}

    /** @param Account|null $item Game Player Account */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    /**
     * @param Account|null $item Game Player Account
     * @return AuthenticationResult
     */
	public function withItem(?Account $item): AuthenticationResult {
		$this->item = $item;
		return $this;
	}

    /** @return array|null Ban status list */
	public function getBanStatuses(): ?array {
		return $this->banStatuses;
	}

    /** @param array|null $banStatuses Ban status list */
	public function setBanStatuses(?array $banStatuses) {
		$this->banStatuses = $banStatuses;
	}

    /**
     * @param array|null $banStatuses Ban status list
     * @return AuthenticationResult
     */
	public function withBanStatuses(?array $banStatuses): AuthenticationResult {
		$this->banStatuses = $banStatuses;
		return $this;
	}

    /** @return string|null Account information used for signing */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Account information used for signing */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Account information used for signing
     * @return AuthenticationResult
     */
	public function withBody(?string $body): AuthenticationResult {
		$this->body = $body;
		return $this;
	}

    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}

    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    /**
     * @param string|null $signature Signature
     * @return AuthenticationResult
     */
	public function withSignature(?string $signature): AuthenticationResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?AuthenticationResult {
        if ($data === null) {
            return null;
        }
        return (new AuthenticationResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Account::fromJson($data['item']) : null)
            ->withBanStatuses(!array_key_exists('banStatuses', $data) || $data['banStatuses'] === null ? null : array_map(
                function ($item) {
                    return BanStatus::fromJson($item);
                },
                $data['banStatuses']
            ))
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "banStatuses" => $this->getBanStatuses() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBanStatuses()
            ),
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}