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

namespace Gs2\Guild\Result;

use Gs2\Core\Model\IResult;
use Gs2\Guild\Model\RoleModel;
use Gs2\Guild\Model\Member;
use Gs2\Guild\Model\Guild;
use Gs2\Guild\Model\SendMemberRequest;

class SendRequestByUserIdResult implements IResult {
    /** @var Guild */
    private $item;
    /** @var SendMemberRequest */
    private $sendMemberRequest;

	public function getItem(): ?Guild {
		return $this->item;
	}

	public function setItem(?Guild $item) {
		$this->item = $item;
	}

	public function withItem(?Guild $item): SendRequestByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getSendMemberRequest(): ?SendMemberRequest {
		return $this->sendMemberRequest;
	}

	public function setSendMemberRequest(?SendMemberRequest $sendMemberRequest) {
		$this->sendMemberRequest = $sendMemberRequest;
	}

	public function withSendMemberRequest(?SendMemberRequest $sendMemberRequest): SendRequestByUserIdResult {
		$this->sendMemberRequest = $sendMemberRequest;
		return $this;
	}

    public static function fromJson(?array $data): ?SendRequestByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SendRequestByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Guild::fromJson($data['item']) : null)
            ->withSendMemberRequest(array_key_exists('sendMemberRequest', $data) && $data['sendMemberRequest'] !== null ? SendMemberRequest::fromJson($data['sendMemberRequest']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "sendMemberRequest" => $this->getSendMemberRequest() !== null ? $this->getSendMemberRequest()->toJson() : null,
        );
    }
}