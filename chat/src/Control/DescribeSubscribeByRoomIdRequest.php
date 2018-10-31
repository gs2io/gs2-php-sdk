<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Chat\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeSubscribeByRoomIdRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeSubscribeByRoomId";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * ロビーの名前を取得
	 *
	 * @return string ロビーの名前
	 */
	public function getLobbyName() {
		return $this->lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 */
	public function setLobbyName($lobbyName) {
		$this->lobbyName = $lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 * @return DescribeSubscribeByRoomIdRequest
	 */
	public function withLobbyName($lobbyName): DescribeSubscribeByRoomIdRequest {
		$this->setLobbyName($lobbyName);
		return $this;
	}

	/**
	 * ルームIDを取得
	 *
	 * @return string ルームID
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 * @return DescribeSubscribeByRoomIdRequest
	 */
	public function withRoomId($roomId): DescribeSubscribeByRoomIdRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを取得
	 *
	 * @return string データの取得を開始する位置を指定するトークン
	 */
	public function getPageToken() {
		return $this->pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 */
	public function setPageToken($pageToken) {
		$this->pageToken = $pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 * @return DescribeSubscribeByRoomIdRequest
	 */
	public function withPageToken($pageToken): DescribeSubscribeByRoomIdRequest {
		$this->setPageToken($pageToken);
		return $this;
	}

	/**
	 * データの取得件数を取得
	 *
	 * @return int データの取得件数
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 * @return DescribeSubscribeByRoomIdRequest
	 */
	public function withLimit($limit): DescribeSubscribeByRoomIdRequest {
		$this->setLimit($limit);
		return $this;
	}

}